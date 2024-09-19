<x-guest-layout>
    <div class="register-box">
        <div class="register-logo"> 
            <a href="/">
                <x-application-logo />
            </a> 
        </div> <!-- /.register-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">
                    Register a new membership
                </p>

                <form action="{{ route('register')}} " method="POST">
                    @csrf

                    <input type="hidden" name="user_type" value="Student">

                    <div class="input-group mb-3"> 
                        <x-input type="text" :invalid="$errors->has('first_name') ? 'is-invalid' : ''"
                            name="first_name"
                            :value="old('first_name')"
                            placeholder="First Name"
                            required autofocus />
                        <div class="input-group-text"> 
                            <span class="bi bi-person"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('first_name')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="text" :invalid="$errors->has('last_name') ? 'is-invalid' : ''"
                            name="last_name"
                            :value="old('last_name')"
                            placeholder="Last Name"
                            required />
                        <div class="input-group-text"> 
                            <span class="bi bi-person"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('last_name')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="text" :invalid="$errors->has('address') ? 'is-invalid' : ''"
                            name="address"
                            :value="old('address')"
                            placeholder="Address" />
                        <div class="input-group-text"> 
                            <span class="bi bi-house"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('address')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="text" :invalid="$errors->has('phone_number') ? 'is-invalid' : ''"
                            name="phone_number"
                            id="phone_number"
                            :value="old('phone_number')"
                            placeholder="Phone Number"
                            maxlength="11"
                            oninput="numericOnly(this)" />
                        <div class="input-group-text"> 
                            <span class="bi bi-phone"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('phone_number')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="email" :invalid="$errors->has('email') ? 'is-invalid' : ''"
                            name="email"
                            :value="old('email')"
                            placeholder="Email" 
                            required />
                        <div class="input-group-text"> 
                            <span class="bi bi-envelope"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="password" :invalid="$errors->has('password') ? 'is-invalid' : ''"
                            name="password" 
                            placeholder="Password"
                            required />
                        <div class="input-group-text"> 
                            <span class="bi bi-lock-fill"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div class="input-group mb-3"> 
                        <x-input type="password" :invalid="$errors->has('password_confirmation') ? 'is-invalid' : ''"
                            name="password_confirmation" 
                            placeholder="Confirm Password"
                            required />
                        <div class="input-group-text"> 
                            <span class="bi bi-lock-fill"></span> 
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" />
                    </div> 
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check"> 
                                <x-checkbox :invalid="$errors->has('agree') ? 'is-invalid' : ''" 
                                    id="agreeCheck" 
                                    onchange="toggleButton('#registerBtn')" />
                                <label class="form-check-label" for="agreeCheck">
                                    I agree to the <a href="#">terms</a> 
                                </label> 
                            </div>
                        </div> <!-- /.col -->

                        <div class="col-4">
                            <div class="d-grid gap-2"> 
                                <button id="registerBtn" type="submit" class="btn btn-primary" disabled> Register </button> 
                            </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                
                <div class="my-4">
                    <p class="mb-0"> 
                        <a href="{{ route('login') }}" class="text-center">
                            I already have a membership
                        </a> 
                    </p>
                </div>
            </div> <!-- /.register-card-body -->
        </div>
    </div> <!-- /.register-box -->

</x-guest-layout>