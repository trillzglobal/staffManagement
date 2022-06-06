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
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
