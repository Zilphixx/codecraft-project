<x-app-layout>
    <main class="app-main">
        <div class="app-content-header"> 
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Dashboard</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                    </div>
                </div> 
            </div>
        </div> 

        <div class="app-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>{{ $data['verifiedTeacherCount'] }}</h3>
                                <p>Verified Teachers</p>
                            </div>
                            <span class="small-box-icon">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <a href="{{ route('verified.teachers') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                More info <i class="bi bi-link-45deg"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>{{ $data['unverifiedTeacherCount'] }}</h3>
                                <p>Unverified Teachers</p>
                            </div>
                            <span class="small-box-icon">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <a href="{{ route('unverified.teachers') }}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                More info <i class="bi bi-link-45deg"></i> 
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>{{ $data['studentCount'] }}</h3>
                                <p>Students</p>
                            </div>
                            <span class="small-box-icon">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                More info <i class="bi bi-link-45deg"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>