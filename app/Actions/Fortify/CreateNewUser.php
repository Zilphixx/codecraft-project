<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        if($input['user_type'] === 'Student') {
            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address' => ['sometimes', 'nullable', 'string', 'max:255'],
                'phone_number' => ['sometimes', 'nullable', 'numeric', Rule::unique(UserDetail::class)],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
            ])->validate();

            $user = User::create([
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'user_type' => $input['user_type']
            ]);
    
            $user->userDetail()->create([
                'first_name' => ucwords($input['first_name']),
                'last_name' => ucwords($input['last_name']),
                'address' => $input['address'],
                'phone_number' => $input['phone_number'],
            ]);

        } else {
            Validator::make($input, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address' => ['sometimes', 'nullable', 'string', 'max:255'],
                'phone_number' => ['sometimes', 'nullable', 'numeric', Rule::unique(UserDetail::class)],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
                'file_path' => ['required', File::image()->max(30 * 1024)]
            ])->validate();

            $user = DB::transaction(function() use ($input) {
                $user = User::create([
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
                    'user_type' => $input['user_type'],
                    'is_verified' => false
                ]);
                
                $filePath = Storage::put('teachers-attachments', $input['file_path'], 'private');
    
                $user->userDetail()->create([
                    'first_name' => ucwords($input['first_name']),
                    'last_name' => ucwords($input['last_name']),
                    'address' => $input['address'],
                    'phone_number' => $input['phone_number'],
                    'file_path' => $filePath
                ]);

                return $user;
            });
        }

        return $user;
    }
}
