<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'interest',
        'file_path'
    ];

    // user model relation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
