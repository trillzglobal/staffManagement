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
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-0 form-group row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Send Password Reset Link') }}
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
