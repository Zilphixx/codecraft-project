<x-guest-layout>
    <div class="login-box">
        <div class="login-logo"> 
            <a href="/">
                <x-application-logo />
            </a> 
        </div> <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    Sign in to start your session
                </p>
                <x-input-error :messages="$errors->get('email')" />
                <form action="{{ route('login') }}" method="POST" class="my-3">
                    @csrf
                    <div class="input-group mb-3"> 
                        <x-input type="email" :invalid="$errors->has('email') ? 'is-invalid' : ''"
                            placeholder="Email" 
                            :value="old('email')" 
                            name="email"
                            required autofocus />
                        <div class="input-group-text"> 
                            <span class="bi bi-envelope"></span> 
                        </div>
                    </div>
                    <div class="input-group mb-3"> 
                        <x-input type="password" :invalid="$errors->has('email') ? 'is-invalid' : ''"
                            placeholder="Password" 
                            name="password" 
                            required />
                        <div class="input-group-text"> 
                            <span class="bi bi-lock-fill"></span> 
                        </div>
                    </div> 
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check"> 
                                <x-checkbox :invalid="$errors->has('remember') ? 'is-invalid' : ''" 
                                    :value="old('remember')" 
                                    name="remember" 
                                    id="rememberCheck" />
                                <label class="form-check-label" for="rememberCheck">
                                    Remember Me
                                </label> 
                            </div>
                        </div> <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2"> 
                                <button type="submit" class="btn btn-primary">Login</button> 
                            </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                
                <div class="my-4">
                    <p class="mb-1"> 
                        <a href="forgot-password.html">I forgot my password</a> 
                    </p>
                    <p class="mb-0"> 
                        <a href="{{ route('register') }}" class="text-center">
                            Register a new membership
                        </a> 
                    </p>
                </div>
            </div> <!-- /.login-card-body -->
        </div>
    </div> <!-- /.login-box -->
</x-guest-layout>