<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row justify-content-between mb-5">

            <div>
                <h4><?php echo e(__('Income Management')); ?></h4>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-plus"></i> <?php echo e(__('Add Income')); ?>

                </button> <br>

            </div>
        </div>

        <div class="row">

            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 font-weight-bold text-info"><?php echo e(__('Income List')); ?></h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('File Holder')); ?></th>
                                            <th><?php echo e(__('Memo No')); ?></th>
                                            <th><?php echo e(__('Client Name')); ?></th>
                                            <th><?php echo e(__('Client Type')); ?></th>
                                            <th><?php echo e(__('Payment By')); ?></th>
                                            <th><?php echo e(__('Transection')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Quantity')); ?></th>
                                            <th><?php echo e(__('Price')); ?></th>
                                            <th><?php echo e(__('Total Price')); ?></th>
                                            <th><?php echo e(__('Received By')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($incom->title); ?></td>
                                                <td><?php echo e($incom->file_book_holder); ?></td>
                                                <td><?php echo e($incom->memo_no); ?></td>
                                                <td><?php echo e($incom->client_name); ?></td>
                                                <td><?php echo e($incom->client_type); ?></td>
                                                <td><?php echo e($incom->payment_by); ?></td>
                                                <td><?php echo e($incom->transection_id); ?></td>
                                                <td><?php echo e($incom->date); ?></td>
                                                <td><?php echo e($incom->quantity); ?></td>
                                                <td><?php echo e($incom->price); ?></td>
                                                <td><?php echo e($incom->total_price); ?></td>
                                                <td><?php echo e($incom->received_by); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('/income/views/')); ?>" data-id="<?php echo e($incom->id); ?>"
                                                        id="viewId" class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#viewModal"> <i class="fa fa-eye"></i> </a><br>

                                                    <a href="" data-id="<?php echo e($incom->id); ?>" id="delIncomeId"
                                                        class="mt-1 btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></a>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Row-->
        </div>


        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Clientname"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="Ititle"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Ifile_book_holder"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Imemo_no"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Iclient_name"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Iclient_type"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Ipayment_by"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Idate"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Iprice"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Itotal_price"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="Ireceived_by"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="POST" id="income-us-form">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"><?php echo e(__('Income Form')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="head"></p>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Title')); ?>:</label>
                                <input type="text" class="form-control" name="title">
                                <p class="title text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('File Book Holder')); ?>:</label>
                                <input type="text" class="form-control" name="file_book_holder">
                                <p class="file_book_holder text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Memo No')); ?>:</label>
                                <input type="text" class="form-control" name="memo_no">
                                <p class="memo_no text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Client Name')); ?>:</label>
                                <input type="text" class="form-control" name="client_name">
                                <p class="client_name text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Client Type')); ?>:</label>
                                <input type="text" class="form-control" name="client_type">
                                <p class="client_type text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Payment By')); ?>:</label>
                                <input type="text" class="form-control" name="payment_by">
                                <p class="payment_by text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Transection Id')); ?>:</label>
                                <input class="form-control" name="transection_id">
                                <p class="transection_id text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Date')); ?>:</label>
                                <input type="date" class="form-control" name="date">
                                <p class="date text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Quantity')); ?>:</label>
                                <input class="form-control" id="qty" name="quantity">
                                <p class="quantity text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Price')); ?>:</label>
                                <input class="form-control" id="price" name="price">
                                <p class="price text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Total Price')); ?>:</label>
                                <input class="form-control" id="total" name="total_price">
                                <p class="total_price text-bold text-danger text-small"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-form-label"><?php echo e(__('Received By')); ?>:</label>
                                <input type="text" class="form-control" name="received_by">
                                <p class="received_by text-bold text-danger text-small"></p>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>

                        <button type="submit" name="submit" class="btn btn-primary"
                            id="saveIncome"><?php echo e(__('Save')); ?></button>
                    </div>


                </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .buttons-print {
            background: #4e73df !important;
            border: none !important;
            color: #fff !important;
        }

    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/buttons.dataTables.min.css')); ?>">
    <script src="<?php echo e(asset('assets/backend/js/buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/buttons.print.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>



<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(function() {

            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });

            $("#income-us-form").on("submit", function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#saveIncome').html('Sending..');


                $.ajax({
                    url: 'insert',
                    type: "POST",
                    data: $('#income-us-form').serialize(),
                    success: (response) => {
                        location.reload();
                        this.reset();

                        $("#income-us-form")[0].reset();
                        $('#saveIncome').html('Submit');

                        toastr["success"]('Successfully Saved Income')
                    },
                    error: function(response) {
                        if (response.responseJSON.errors.title) {
                            response.responseJSON.errors.title.forEach(title => {
                                $('.title').text(title);
                            });
                        }
                        if (response.responseJSON.errors.file_book_holder) {
                            response.responseJSON.errors.file_book_holder.forEach(
                                title => {
                                    $('.file_book_holder').text(title);
                                });
                        }
                        if (response.responseJSON.errors.client_name) {
                            response.responseJSON.errors.client_name.forEach(
                                title => {
                                    $('.client_name').text(title);
                                });
                        }
                        if (response.responseJSON.errors.client_type) {
                            response.responseJSON.errors.client_type.forEach(
                                title => {
                                    $('.client_type').text(title);
                                });
                        }

                        if (response.responseJSON.errors.payment_by) {
                            response.responseJSON.errors.payment_by.forEach(
                                title => {
                                    $('.payment_by').text(title);
                                });
                        }
                        if (response.responseJSON.errors.received_by) {
                            response.responseJSON.errors.received_by.forEach(
                                title => {
                                    $('.received_by').text(title);
                                });
                        }
                        if (response.responseJSON.errors.memo_no) {
                            response.responseJSON.errors.memo_no.forEach(title => {
                                $('.memo_no').text(title);
                            });
                        }
                        if (response.responseJSON.errors.transection_id) {
                            response.responseJSON.errors.transection_id.forEach(
                                title => {
                                    $('.transection_id').text(title);
                                });
                        }
                        if (response.responseJSON.errors.date) {
                            response.responseJSON.errors.date.forEach(title => {
                                $('.date').text(title);
                            });
                        }
                        if (response.responseJSON.errors.quantity) {
                            response.responseJSON.errors.quantity.forEach(title => {
                                $('.quantity').text(title);
                            });
                        }
                        if (response.responseJSON.errors.price) {
                            response.responseJSON.errors.price.forEach(title => {
                                $('.price').text(title);
                            });
                        }
                        if (response.responseJSON.errors.total_price) {
                            response.responseJSON.errors.total_price.forEach(
                                title => {
                                    $('.total_price').text(title);
                                });
                        }


                    }
                });


            });


            $(document).on("keyup", "#qty", function(arg) {
                var quantity = $('#qty').val();
                var price = $("#price").val();
                var total = Number(quantity) * Number(price);
                $('#total').val(total);

            });

            $(document).on("keyup", "#price", function(arg) {
                var price = $("#price").val();
                var quantity = $("#qty").val();

                var total = Number(quantity) * Number(price);
                $('#total').val(total);

            });

            $(document).on("click", "#delIncomeId", function(arg) {

                arg.preventDefault();
                var id = $(this).data("id");
                var url = 'deleted/';

                new swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: url,
                                type: "GET",
                                data: {
                                    id: id
                                },

                                dataType: "JSON",
                                success(response) {
                                    location.reload()
                                    swal("Deleted",
                                        "Data has been Deleted Successfully",
                                        "success");;
                                }
                            });

                        } else {
                            swal("Your data is safe!");
                        }
                    });



            });


            /*---------------View Data-----------------------*/
            $(document).on("click", "#viewId", function(e) {
                e.preventDefault();



                var id = $(this).data("id");
                var url = $(this).attr("href");

                $.ajax({
                    url: url,
                    data: {
                        id: id
                    },
                    type: "GET",
                    dataType: "JSON",
                    success: function(response) {
                        if ($.isEmptyObject(response) != null) {
                            $("#viewModal").modal("show");

                            $("#Clientname").text(response.client_name + "'s Data");

                            $(".Ititle").text("Title: " + response.title);
                            $(".Ifile_book_holder").text("File Book Holder: " +
                                response.file_book_holder);
                            $(".Imemo_no").text("Memo No: " + response.memo_no);
                            $(".Iclient_name").text("Client Name: " + response
                                .client_name);
                            $(".Iclient_type").text("Client Type: " + response
                                .client_type);
                            $(".Ipayment_by").text("Payment By: " + response
                                .payment_by);
                            $(".Itransection_id").text("Transection Id: " + response
                                .transection_id);
                            $(".Idate").text("Date: " + response.date);
                            $(".Iquantity").text("Quantity: " + response.quantity);
                            $(".Iprice").text("Price: " + response.price);
                            $(".Itotal_price").text("Total Price: " + response
                                .total_price);
                            $(".Ireceived_by").text("Received By: " + response
                                .received_by);

                        } else {

                        }
                    }
                });
            });



            $(document).on("click", "#deleteId", function(arg) {

                var x = confirm("Are you sure you want to delete?");
                if (x == true) {

                    arg.preventDefault();
                    var id = $(this).data("id");
                    var url = 'delet';

                    $.ajax({
                        url: url,
                        data: {
                            id: id
                        },
                        type: "GET",
                        dataType: "JSON",
                        success(response) {
                            swal("Deleted", "Data has been Deleted Successfully",
                                "success");
                            location.reload();
                        }
                    });

                }
            });


        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/admin/Income/add_income.blade.php ENDPATH**/ ?>