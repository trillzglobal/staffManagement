@extends('auth.master_auth')

@section('section')

<div class="image">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{__('Welcome To')}} <br>{{ @$sitename->sitename }}</h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                
                                        <input type="hidden" name="token" value="{{ $token }}">
                
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label for="email">{{ __('E-Mail Address') }}</label>
                    
                                               
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                               
                                            </div>
                    
                                            <div class="form-group col-md-12">
                                                <label for="password">{{ __('Password') }}</label>
                    
                                               
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                               
                                            </div>
                    
                                            <div class="form-group col-md-12">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    
                                               
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                               
                                            </div>
                    
                                            <div class="form-group col-md-12">
                                                
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Reset Password') }}
                                                    </button>
                                               
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">{{__('Already Have a Account ! Login Here')}}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
