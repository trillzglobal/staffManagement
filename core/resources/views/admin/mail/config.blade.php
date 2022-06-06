@extends('admin.admin-layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">{{ __($pageTitle) }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">

                                    <label for="">{{ __('Email Method') }}</label>
                                    <select name="email_method" id="" class="form-control">

                                        <option value="php" {{ @$sitename->email_method == 'php' ? 'selected' : '' }}>
                                            {{ __('PHPMail') }}</option>
                                        <option value="smtp" {{ @$sitename->email_method == 'smtp' ? 'selected' : '' }}>
                                            {{ __('SMTP Mail') }}</option>

                                    </select>

                                </div>

                                <div class="form-group col-md-6">

                                    <label for="">{{ __('Email Sent From') }}</label>

                                    <input type="email" name="site_email" class="form-control form_control"
                                        value="{{ @$sitename->site_email }}">

                                </div>

                                <div class="form-group col-md-12 smtp-config">


                                    @if (@$sitename->email_method == 'smtp')

                                        <div class="row">

                                            <div class="col-md-3">

                                                <label for="">{{ __('SMTP HOST') }}</label>
                                                <input type="text" name="email_config[smtp_host]" class="form-control"
                                                    value="{{ @$sitename->email_config->smtp_host }}">

                                            </div>

                                            <div class="col-md-3">

                                                <label for="">{{ __('SMTP Username') }}</label>
                                                <input type="text" name="email_config[smtp_username]" class="form-control"
                                                    value="{{ @$sitename->email_config->smtp_username }}">

                                            </div>

                                            <div class="col-md-3">

                                                <label for="">{{ __('SMTP Password') }}</label>
                                                <input type="text" name="email_config[smtp_password]" class="form-control"
                                                    value="{{ @$sitename->email_config->smtp_password }}">

                                            </div>
                                            <div class="col-md-3">

                                                <label for="">{{ __('SMTP port') }}</label>
                                                <input type="text" name="email_config[smtp_port]" class="form-control"
                                                    value="{{ @$sitename->email_config->smtp_port }}">

                                            </div>

                                            <div class="col-md-6 mt-3">

                                                <label for="">{{ __('SMTP Encryption') }}</label>
                                                <select name="email_config[smtp_encryption]" id="encryption"
                                                    class="form-control">
                                                    <option value="ssl"
                                                        {{ @$sitename->email_config->smtp_encryption == 'ssl' ? 'selected' : '' }}>
                                                        {{ __('SSL') }}</option>
                                                    <option value="tls"
                                                        {{ @$sitename->email_config->smtp_encryption == 'tls' ? 'selected' : '' }}>
                                                        {{ __('TLS') }}</option>
                                                </select>

                                                <code class="hint"></code>

                                            </div>

                                        </div>


                                    @endif

                                </div>

                                <div class="form-group col-md-12">

                                    <button type="submit"
                                        class="btn btn-primary">{{ __('Update Email Configuration') }}</button>

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')

    <script>
        $(function() {
            'use strict'

            $('select[name=email_method]').on('change', function() {
                if ($(this).val() == 'smtp') {
                    var html = `
                
                     <div class="row">

                                    <div class="col-md-3">

                                        <label for="">{{ __('SMTP HOST') }}</label>
                                        <input type="text" name="email_config[smtp_host]"  class="form-control" value="{{ @$sitename->email_config->smtp_host }}">

                                    </div> 
                                    
                                    <div class="col-md-3">

                                        <label for="">{{ __('SMTP Username') }}</label>
                                        <input type="text" name="email_config[smtp_username]"  class="form-control" value="{{ @$sitename->email_config->smtp_username }}">

                                    </div>
                                    
                                    <div class="col-md-3">

                                        <label for="">{{ __('SMTP Password') }}</label>
                                        <input type="text" name="email_config[smtp_password]"  class="form-control" value="{{ @$sitename->email_config->smtp_password }}">

                                    </div>
                                    <div class="col-md-3">

                                        <label for="">{{ __('SMTP port') }}</label>
                                        <input type="text" name="email_config[smtp_port]"  class="form-control" value="{{ @$sitename->email_config->smtp_port }}">

                                    </div> 
                                    
                                    <div class="col-md-6 mt-3">

                                        <label for="">{{ __('SMTP Encryption') }}</label>
                                       <select name="email_config[smtp_encryption]" id="encryption" class="form-control">
                                        <option value="tls" {{ @$sitename->email_config->smtp_encription == 'tls' ? 'selected' : '' }}>{{ __('TLS') }}</option>
                                        <option value="ssl" {{ @$sitename->email_config->smtp_encription == 'ssl' ? 'selected' : '' }}>{{ __('SSL') }}</option>
                                       </select>


                                       <code class="hint"></code>

                                    </div>
                                
                                </div>
                
                `;

                    $('.smtp-config').html(html)

                } else {
                    $('.smtp-config').html('')
                }
            })

            $(document).on('change', '#encryption', function() {

                if ($(this).val() == 'ssl') {
                    $('.hint').text("For SSL please add ssl:// before host otherwise it won't work")
                } else {
                    $('.hint').text('')
                }
            })
        })
    </script>

@endpush
