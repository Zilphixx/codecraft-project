<x-guest-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 style="font-size: 100px;">
                            <i class="bi bi-envelope"></i>
                            <span style="font-size: 25px; display: block;">Please Check Your Email for Verification!</span>
                        </h1>
                        <p class="col-8 mx-auto mt-3">
                            Thanks for signing up! Before getting started, 
                            could you verify your email address by clicking on the link we just emailed to you? 
                            If you didn't receive the email, we will gladly send you another.
                        </p>
                        @if (session('status') == 'verification-link-sent')
                            <p class="col-8 mx-auto my-3 text-success">
                                A new email verification link has been emailed to you!
                            </p>
                        @endif
                        <div class="d-flex flex-column gap-2 align-items-center mt-3">
                            <button form="resend-verification-form" class="btn btn-primary w-50">Resend Verfication Email</button>
                            <button form="logout-guest-form" class="btn btn-primary w-50">Go Back to Login Page</button>
                        </div>
                        <form id="resend-verification-form" action="{{ route('verification.send') }}" method="POST">
                            @csrf
                        </form>
                        <form id="logout-guest-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>