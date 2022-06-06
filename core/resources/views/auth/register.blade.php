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
                                            <h1 class="h4 text-gray-900 mb-4">{{__('Welcome To')}} <br> {{@$sitename->sitename}}</h1>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">

                                                <div class="form-group col-md-12">
                                                    <input id="name" type="text" placeholder="Enter Name"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
    
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input id="email" placeholder="Enter Email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                                        value="{{ old('email') }}" required autocomplete="email">
    
                                                    @error('email')
                                                        <div class="alert alert-danger" role="alert"
                                                            >
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
    
                                                <div class="form-group col-md-12">
                                                    <input id="password" placeholder="Enter Password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">
    
                                                    @error('password')
                                                        <div class="alert alert-danger" role="alert"
                                                            >
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
    
                                                <div class="form-group col-md-12">
                                                    <input id="password-confirm" placeholder="Confirm Password" type="password"
                                                        class="form-control" name="password_confirmation" required
                                                        autocomplete="new-password">
    
                                                    @error('password')
                                                        <div class="alert alert-danger" role="alert"
                                                            >
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
    
                                                <div class="form-group col-md-12">
                                                    <select class="form-control" name="user_type"
                                                        required>
                                                        <option value="">-{{__('select')}}-</option>
                                                        <option value="employee">{{__('Employee')}}</option>
                                              
                                                    </select>
                                                    @error('usert_type')
                                                        <div class="alert alert-danger" role="alert"
                                                            >
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
    
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Registration') }}
                                                </button>
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
