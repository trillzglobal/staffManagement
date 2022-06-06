<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button class="mb-3 btn btn-primary" data-toggle="modal" data-target="#addModal"><i
                                class="fa fa-plus"></i> <?php echo e(__('Add Invoice')); ?></button>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Invoice ID')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Invoice To')); ?></th>
                                        <th><?php echo e(__('Contact')); ?></th>

                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                        <tr>
                                            <td>
                                                <?php echo e($inv->id); ?>

                                            </td>
                                            <td><?php echo e($inv->date); ?></td>
                                            <td><?php echo e($inv->invoiceto); ?></td>
                                            <td>
                                                <?php echo e($inv->contact); ?>

                                            </td>
                                            <td>
                                                <a href="#" data-items="<?php echo e($inv->list_price); ?>" id="invoiceEditBtn"
                                                    edit_id="<?php echo e($inv->id); ?>"
                                                    class="btn btn-sm btn-warning"><?php echo e(__('Edit')); ?></a>
                                                <a href="<?php echo e(route('invoice.view', $inv->id)); ?>"
                                                    class="btn btn-sm btn-info"><?php echo e(__('View')); ?></a>
                                                <a href="<?php echo e(route('invoice.email', $inv->id)); ?>"
                                                    class="btn btn-sm btn-primary"><?php echo e(__('Email')); ?></a>
                                                <a href="#" id="deleteinvoiceId" delete_id="<?php echo e($inv->id); ?>"
                                                    class="btn btn-sm btn-danger"><?php echo e(__('Delete')); ?></a>

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


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Invoice Form')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="" method="POST" id="invoice-us-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice Date')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="date" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice To')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="invoiceto" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice contact')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="contact" required>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Payment Status')); ?></label>
                                        <div class="col-sm-8">
                                            <select name="status" class="form-control" id="status">
                                                <option value="0"><?php echo e(__('Unpaid')); ?></option>
                                                <option value="1"><?php echo e(__('Full Payment')); ?></option>
                                                <option value="2"><?php echo e(__('Partial Payment')); ?></option>
                                            </select>
                                        </div>
                                    </div>


                                    <table class="ml-4">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('Item')); ?></th>

                                                <th scope="col"><?php echo e(__('Price')); ?></th>

                                                <th scope="col"><button id="add_new_invoice" type="button" name="add_new"
                                                        class="btn btn-sm btn-success">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="mainbody">

                                            <tr class="mb-2">
                                                <td><input class="item form-control" type="text" name="addmore[0][item]"
                                                        required>
                                                </td>
                                                <td><input class="pricei form-control" type="number"
                                                        name="addmore[0][price]" id="price0" required></td>

                                            </tr>

                                        </tbody>
                                        <tr>

                                            <td>
                                            </td>
                                            <td><input type="number" class="form-control" name="total" id="neti"
                                                    readonly="readonly" placeholder="net price"></td>
                                        </tr>


                                    </table>

                                    <div class="mt-4 form-group row partial">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Partial Amount')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="partial" name="partial">
                                        </div>
                                    </div>

                                    <div class="form-group row due ">
                                        <label for="input-12" class="col-sm-4 col-form-label"><?php echo e(__('Due')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="due" name="due" readonly>
                                        </div>
                                    </div>


                                    <br>
                                    <button type="submit" name="submit" class="float-left btn btn-sm btn-primary"
                                        id="saveinvoice"><?php echo e(__('Save')); ?></button><br><br>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="emailModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Email Invoice')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                </div>
            </div>
        </div>
    </div>


    <!-- Edit  Modal -->
    <div class="modal fade" id="invoiceEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit Invoice Form')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="" method="POST" id="invoice-edit-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice Date')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="date" required>
                                            <input type="text" class="form-control d-none" name="id" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice To')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="invoiceto" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Invoice contact')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="contact" required>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Payment Status')); ?></label>
                                        <div class="col-sm-8">
                                            <select name="status" class="form-control" id="status">
                                                <option value="0" id="unpaid"><?php echo e(__('Unpaid')); ?></option>
                                                <option value="1" id="fullPayment"><?php echo e(__('Full Payment')); ?></option>
                                                <option value="2" id="partialsPayment"><?php echo e(__('Partial Payment')); ?></option>
                                            </select>
                                        </div>
                                    </div>





                                    <table class="ml-4">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?php echo e(__('Item')); ?></th>

                                                <th scope="col"><?php echo e(__('Price')); ?></th>

                                                <th scope="col"><button id="add_new_invoice" type="button" name="add_new"
                                                        class="btn btn-sm btn-success">+</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="mainbody">



                                        </tbody>
                                        <tr>

                                            <td>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="total" id="neti"
                                                    readonly="readonly" placeholder="net price">
                                            </td>
                                        </tr>


                                    </table>

                                    <div class="mt-4 form-group row partial">
                                        <label for="input-12"
                                            class="col-sm-4 col-form-label"><?php echo e(__('Partial Amount')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="partial" name="partial">
                                        </div>
                                    </div>

                                    <div class="form-group row due ">
                                        <label for="input-12" class="col-sm-4 col-form-label"><?php echo e(__('Due')); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="due" name="due" readonly>
                                        </div>
                                    </div>


                                    <br>
                                    <button type="submit" name="submit" class="float-left btn btn-sm btn-primary"
                                        id="editinvoice"><?php echo e(__('Update')); ?></button><br><br>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>








<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(document).ready(function() {
            $('#myTable').DataTable();

            let j = 1;

            function nettotalfind() {

                var sum = 0;

                $('.pricei').each(function() {

                    var value = $(this).val();

                    if ($(this).val() == '') {

                        value = 0;
                    }
                    sum += parseFloat(value);
                });


                $('#neti').val(sum);

            }

            function nettotalfindUpdate() {

                var sum = 0;

                $('#invoice-edit-form .pricei').each(function() {

                    var value = $(this).val();

                    if ($(this).val() == '') {

                        value = 0;
                    }
                    sum += parseFloat(value);
                });


                $('#invoice-edit-form #neti').val(sum);

            }



            $(document).on("keyup", ".pricei", function() {

                var sum = 0;
                $(".pricei").each(function() {
                    sum += +$(this).val();
                });

                $(".total").val(sum);
                $('#neti').val(sum);
            });

            $(document).on("keyup", "#partial", function() {

                var partial = $(this).val();

                var t = $('#neti').val();
                var due = t - partial;

                $("#due").val(due);


            });



            $("#invoice-us-form").on("submit", function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#saveinvoice').html('Sending..');

                $.ajax({
                    url: "<?php echo e(route('invoice.add')); ?>",
                    type: "POST",
                    data: $('#invoice-us-form').serialize(),
                    dataType: "json",
                    success(response) {

                        location.reload();


                    },
                });

            });

            /*---------delete data-----------*/
            $(document).on("click", "#deleteinvoiceId", function(arg) {
                arg.preventDefault();
                var id = $(this).attr("delete_id");

                var url = "<?php echo e(route('invoice.delete', ':id')); ?>";

                url = url.replace(':id', id);

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

                        } else {
                            swal("Your data is safe!");
                        }
                    });


            });



            $('#add_new_invoice').on('click', function() {


                $('#mainbody').append(
                    '<tr><td><input type="text" class="form-control mt-2" name="addmore[' +
                    j + '][item]" required></td>' +
                    '<td><input class="pricei form-control mt-2" type="number"  name="addmore[' +
                    j + '][price]"  id="price' + j + '" required></td>' +
                    '<td><button type="button" name="remove"  id="remove" value="remove" class="btn btn-sm btn-danger mt-2">-</button></td></tr>'
                );


                j++
            });


            $('#mainbody').on('click', '#remove', function() {
                $(this).closest('tr').remove();
                nettotalfind();
            });









            /*-------------another way---------------*/
            $('#AddToList').on('click', function() {
                var ItemId = $('#ItemId').val();
                var ItemName = $("#ItemId :selected").text();
                var price = $('#price').val();
                var GroupID = $('#GroupID').val();
                var GroupName = $("#GroupID :selected").text();

                var ClassID = $('#ClassID').val();
                var ClassName = $("#ClassID :selected").text();


                $("#tblDetails tbody").append(
                    "<tr><td class='ItemId'><input></td><td class='ItemId'><input></td><td class='GroupID'><input></td><td class='ClassID'><input></td><td><button class='btn btn-danger btn-xs btn-delete'>remove</button></td></tr>"
                );

            });

            $("body").on("click", ".btn-delete", function() {
                $(this).parents("tr").remove();
            });


            $(document).ready(function() {
                $(".partial").hide();
                $(".due").hide();




                $("#status").on('change', function() {
                    if ($('#status').val() == "2") {
                        $(".partial").show();
                        $(".due").show();

                    } else {
                        $(".partial").hide();
                        $(".due").hide();

                    }


                });
            });




            $('#invoice-edit-form select#status').on('change', function() {

                let status = $('#invoice-edit-form select#status').val();

                if (status == "2") {
                    $("#invoice-edit-form .partial").show();
                    $("#invoice-edit-form .due").show();
                } else {
                    $("#invoice-edit-form .partial").hide();
                    $("#invoice-edit-form .due").hide();
                }
            });




            let i = 999;
            $('#invoice-edit-form #add_new_invoice').on('click', function(e) {

                $('#invoice-edit-form #mainbody').append(
                    '<tr><td><input type="text" class="form-control mt-2" name="addmore[' + i +
                    '][item]" required></td>' +
                    '<td><input class="pricei form-control mt-2" type="number"  name="addmore[' + i +
                    '][price]"  id="price' + i + '" required></td>' +
                    '<td><button type="button" name="remove"  id="remove" value="remove" class="btn btn-sm btn-danger mt-2">-</button></td></tr>'
                );
                i++;
            });

            $('#invoice-edit-form #mainbody').on('click', '#remove', function() {
                $(this).closest('tr').remove();
                nettotalfindUpdate();
            });


            // this functiion wiill exicute for calculate net price
            $(document).on('keyup', '#invoice-edit-form .pricei', function(e) {
                let sum = 0;
                $("#invoice-edit-form .pricei").each(function() {
                    sum += +$(this).val();
                });

                $(".total").val(sum);
                $('#invoice-edit-form #neti').val(sum);


            })


            // this functiion wiill exicute for calculate net price
            $('#invoice-edit-form #partial').on('keyup', function(e) {
                let sum = $('#invoice-edit-form #neti').val();
                let partiials = $(this).val();
                let due = sum - partiials;

                $("#invoice-edit-form #due").val(due);

            });



            // if click on Ediit  button this functiion will exiicute

            $(document).on('click', '#invoiceEditBtn', function(e) {
                e.preventDefault();
                let id = $(this).attr('edit_id');
                let items = $(this).data('items');

                var url = "<?php echo e(route('invoice.edit', ':id')); ?>";

                url = url.replace(':id', id);


                let html = '';
                $.ajax({
                    url: url,
                    success: function(output) {
                        $('#invoiceEditModal').modal('show');
                        $('#invoice-edit-form input[name="date"]').val(output.data.date);
                        $('#invoice-edit-form input[name="invoiceto"]').val(output.data
                            .invoiceto);
                        $('#invoice-edit-form input[name="contact"]').val(output.data.contact);
                        if (output.data.payment_status == "1") {
                            $('#fullPayment').attr("selected", "selected")
                            $('#unpaid').removeAttr("selected")
                            $('#partialsPayment').removeAttr("selected")
                        } else if (output.data.payment_status == "0") {
                            $('#unpaid').attr("selected", "selected")
                            $('#fullPayment').removeAttr("selected")
                            $('#partialsPayment').removeAttr("selected")
                        } else if (output.data.payment_status == "2") {
                            $('#partialsPayment').attr("selected", "selected")
                            $("#invoice-edit-form .partial").show();
                            $("#invoice-edit-form .due").show();
                            $('#fullPayment').removeAttr("selected")
                            $('#unpaid').removeAttr("selected")
                        }


                        for (let index = 0; index < items.length; index++) {
                            html = html + '<tr><td><input value="' + items[index].item +
                                '" type="text" class="form-control mt-2" name="addmore[' +
                                index + '][item]" required></td>' +
                                '<td><input value="' + items[index].price +
                                '" class="pricei form-control mt-2" type="number"  name="addmore[' +
                                index + '][price]"  id="price' + index + '" required></td>' +
                                '<td><button type="button" name="remove"  id="remove" value="remove" class="btn btn-sm btn-danger mt-2">-</button></td></tr>'

                        }

                        $('#invoice-edit-form #mainbody').html(html);

                        if (output.data.due != "") {
                            $('#invoice-edit-form input[name="due"]').val(output.data.due);
                        }

                        if (output.data.partial != "") {
                            $('#invoice-edit-form input[name="partial"]').val(output.data
                                .partial);
                        }

                        $('#invoice-edit-form input[name="total"]').val(output.data.total);
                        $('#invoice-edit-form input[name="id"]').val(output.data.id);



                    }
                })
            });

            $(document).on('submit', '#invoice-edit-form', function(e) {
                e.preventDefault();
                let id = $('#invoice-edit-form input[name="id"]').val();

                var url = "<?php echo e(route('invoice.update', ':id')); ?>";

                url = url.replace(':id', id);


                $.ajax({
                    url: url,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(output) {
                        if (output) {
                            $('#invoiceEditModal').modal('hide');
                            location.reload();
                        }
                    }


                })

            });
        });
    </script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/invoice/invoice_add.blade.php ENDPATH**/ ?>