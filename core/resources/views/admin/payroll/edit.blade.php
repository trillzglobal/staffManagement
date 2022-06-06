@extends('admin.admin-layouts.master')


@section('content')

    <div class="row">
        <div class="container col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">{{ __('Edit Salary') }}</h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.paymentupdate', $id->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf                     
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Salary') }}</label>
                                    <input name="salary" id="salary" class="form-control" type="text"
                                        value="{{ $id->salary }}" readonly>
                                    <input name="user_id" id="salary" class="form-control" type="hidden"
                                        value="{{ $id->user_id }}" readonly>
                                    <input name="id" id="sry" class="form-control" type="hidden"
                                        value="{{ $id->id }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('From Date') }}</label>
                                    <input name="fromdate" id="fromdate" class="form-control" type="text"
                                        value="{{ $id->fromdate }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Till date') }}</label>
                                    <input name="todate" id="todate" class="form-control" type="text"
                                        value="{{ $id->todate }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Deduction') }}</label>
                                    <input name="deduction" id="deduction" value="{{ $id->deduction }}"
                                        class="form-control deduction" type="text">
                                    <input name="attendance_count" value="" class="form-control" type="hidden">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Bonus') }}</label>
                                    <input name="bonus" id="bonus" value="{{ $id->bonus }}"
                                        class="form-control bonus" type="text">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Comment') }}</label>
                                    <input name="comment" id="comment" value="{{ $id->comment }}"
                                        class="form-control" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">{{ __('Total') }}</label>
                                    <input name="total" value="{{ $id->total_salary }}" id="total"
                                        class="form-control total" type="text" readonly>
                                </div>

                                <div class="form-check col-md-6">
                                    <input class="form-check-input" name="approve_key" type="checkbox" value="1"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ __('Pending') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input name="submit" class="btn btn-block btn-primary" type="submit">
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>



@endsection


@push('script')


    <script>
        $(function() {

            'use strict'

            function nettotalfind() {
                var sum = 0;
                $('.total').each(function() {
                    sum += parseFloat($(this).val());
                });

                $('#total').val(sum);

            }

            $(document).on("keyup", ".deduction", function() {
               
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();


            });
            $(document).on("keyup", ".bonus", function(arg) {
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();
            });

        })
    </script>

@endpush
