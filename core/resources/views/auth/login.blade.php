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
                                            <img src"{{ asset('assets/images/logo/'.@$sitename->logo) }}">
                                            <h1 class="h4 text-gray-900 mb-4">{{__('Welcome To')}} <br>{{@$sitename->sitename}}</h1>
                                            
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address..." @error('email') is-invalid
                                                    @enderror name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>
                                                @error('email')
                                                    <p><strong>{{ $message }}</strong></p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" @error('password')
                                                    is-invalid @enderror name="password" required
                                                    autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}
                                                        >

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>

                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>
                                            <hr>

                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{route('register')}}" >{{__('Create an
                                                Account')}}!</a>
                                        </div>
                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}"
                                                    >
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
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

