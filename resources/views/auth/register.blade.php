<x-guest-layout>
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 bg-white auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <a href="{{ route('home') }}" class="logo logo-admin">
                                        <img src="{{ asset($themeTrue . 'images/logo.png') }}" height="50"
                                            alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-dark fs-18">Create an account</h4>
                                    <p class="text-muted fw-medium mb-0">Enter your detail to Create your account today.
                                    </p>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form class="my-4" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" fdprocessedid="wa4rse">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div><!--end form-group-->

                                    <div class="form-group mb-2">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" fdprocessedid="wa4rse">

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="form-group mb-2">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter password" fdprocessedid="1yu8">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Enter Confirm password"
                                            fdprocessedid="1yu8">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <button class="btn btn-primary" type="submit"
                                                    fdprocessedid="djk3vx">{{ __('Register') }}<i
                                                        class="fas fa-sign-in-alt ms-1"></i></button>
                                            </div>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                                <div class="text-center">
                                    <p class="text-muted">Already have an account ? <a href="{{ route('login') }}"
                                            class="text-primary ms-2">Log in</a></p>
                                </div>

                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div>
</x-guest-layout>
