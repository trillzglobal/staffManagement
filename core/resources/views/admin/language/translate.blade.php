@extends('admin.admin-layouts.master')
@section('content')

    <div class="container">

        <div class="row">

            <div class="card col-md-10">

                <div class="card-header">
                    <div class="w-50">
                        <div class="input-group mb-3">
                            <select class="custom-select export" id="inputGroupSelect02">
                                <option selected> {{__('Select Language')}} </option>
                                @foreach ($languages as $la)
                                    <option value="{{ $la->short_code }}">{{ $la->name }}</option>
                                @endforeach

                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text bg-primary text-white" for="inputGroupSelect02">{{__('Import
                                    From')}}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-right mb-3">
                        <button class="btn btn-primary addmore"> <i class="fa fa-plus"></i> {{__('Add More')}}</button>

                    </div>
                    <form action="" method="post">
                        @csrf
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Key') }}</th>
                                    <th>{{ __('Value') }}</th>
                                </tr>
                            </thead>
                           
                            <tbody id="append">
                              
                                    @forelse ($translators as $key => $translate)
                                    
                                        <tr>
                                            <td>
                                                <textarea type="text" name="key[]"
                                                    class="form-control">{{ clean($key) }}
                                                </textarea>
                                            </td>
                                            <td>
                                            <textarea type="text" name="value[]"
                                                    class="form-control">{{ clean($translate) }}
                                                </textarea>
                                            </td>

                                        </tr>
                                    @empty



                                    @endforelse

                               


                            </tbody>
                        </table>

                        <button type="submit" class="btn btn-primary">{{__('Update Language')}}</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        'use strict'
        $(function() {
            let i = {{ $translators != null ? count($translators) : 0 }};
            $('.addmore').on('click', function() {
                let html = `
                        <tr>
                            <td>
                                <textarea type="text" name="key[]" class="form-control"></textarea>
                            </td>
                            <td>
                                <textarea type="text" name="value[]" class="form-control"></textarea>
                            </td>

                        </tr>
            `;
                i++;
                $('#append').append(html);
            })

            $('.export').on('change', function() {
                let lang = $(this).val();
                let current = "{{ request()->lang }}"
                $.ajax({
                    url: "{{ route('language.import') }}",
                    method: "GET",
                    data: {
                        import: lang,
                        current: current
                    },
                    success: function(response) {
                        toastr.success('Imported Success');
                        window.location.reload(true)
                    }
                })
            })
        })
    </script>

@endpush
