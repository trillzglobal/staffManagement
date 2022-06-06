@extends('admin.admin-layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info">{{__('Change Logo')}}</h6>
                    </div>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{__('Logo Updated')}}
                            </div>

                        @endif

                        <form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div id="image-preview" style="background: url({{ asset('assets/images/logo/' . @$logo->logo) }})">

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('Upload')}}</span>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload">
                                    <label class="custom-file-label" for="inputGroupFile01">{{__('Choose file')}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Logo">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection


@push('style')

    <style>
        #image-preview {
            width: 300px;
            height: 300px;
            border: 1px dotted lightgray;
            background-position: center;
            background-repeat: no-repeat !important;
            object-fit: cover;
            margin-bottom: 15px;
        }

    </style>

@endpush


@push('script')

    <script>
        'use strict'

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").on('change', function() {
            readURL(this);
        });
    </script>

@endpush
