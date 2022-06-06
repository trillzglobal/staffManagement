<?php $__env->startSection('content'); ?>

    <div class="container">

        <button class="mb-3 btn btn-primary" data-toggle="modal" data-target="#addModal"><?php echo e(__('Add Expense')); ?> +</button>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Expense Category')); ?></th>
                                        <th><?php echo e(__('Items')); ?></th>
                                        <th><?php echo e(__('Total Expense')); ?></th>
                                        <th><?php echo e(__('Expense Date')); ?></th>
                                        <th><?php echo e(__('Comment')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $expensives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(@$expense->category->expense_category_name); ?></td>
                                            <td class="w-75">

                                                <?php $__currentLoopData = $expense->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p class="font-weight-bolder"><?php echo e(__('Item')); ?></p>
                                                            <p><?php echo e($item->item); ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="font-weight-bolder"><?php echo e(__('Qty')); ?></p>
                                                            <p><?php echo e($item->qty); ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="font-weight-bolder"><?php echo e(__('Price')); ?></p>
                                                            <p><?php echo e($item->price); ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="font-weight-bolder"><?php echo e(__('Total')); ?></p>
                                                            <p><?php echo e($item->total); ?></p>
                                                        </div>

                                                    </div>
                                                    <?php if(!$loop->last): ?>
                                                        <hr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e(@$expense->total_expense); ?></td>
                                            <td><?php echo e(@$expense->expense_date); ?></td>
                                            <td><?php echo e(@$expense->comment); ?></td>
                                            <td>

                                                <a data-href="<?php echo e(route('expense.delete',$expense->id)); ?>" id="deleteExpenseId" data_id="<?php echo e(@$expense->id); ?>"
                                                    class="btn btn-sm btn-danger text-white"><?php echo e(__('Delete')); ?></a>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Add Expense Form')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post" id="expense-us-form">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <form action="" method="POST" id="expense-us-form">
                                        <?php echo csrf_field(); ?>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><?php echo e(__('Manage Category')); ?></label>
                                                <select class="form-control" name="category_id">
                                                    <option value=""><?php echo e('Select'); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$category->id); ?>">
                                                            <?php echo e(@$category->expense_category_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for=""><?php echo e(__('Date')); ?></label>
                                                <input type="datetime-local" class="form-control" name="expense_date"
                                                    required>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label><?php echo e(__('Comment')); ?></label>
                                                <textarea type="text" class="form-control" name="comment"
                                                    required></textarea>
                                            </div>

                                        </div>


                                        <div class="col-md-12 text-right">
                                            <button id="add_new" type="button" name="add_new"
                                                class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                                                <?php echo e('Add Items'); ?></button>
                                        </div>

                                        <div id="mainbody" class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for=""><?php echo e('Item'); ?></label>
                                                    <input class="item form-control" type="text" name="addmore[0][item]"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""><?php echo e(__('Quantity')); ?></label>
                                                    <input class="qty form-control" type="number" name="addmore[0][qty]"
                                                        id="qty0" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""><?php echo e(__('Price')); ?></label>
                                                    <input class="price form-control" type="number" name="addmore[0][price]"
                                                        id="price0" required>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for=""><?php echo e(__('Total')); ?></label>
                                                    <input type="number" name="addmore[0][total]" readonly="readonly"
                                                        id="total0" class="total form-control" placeholder="Total">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 offset-sm-9">
                                            <label for=""><?php echo e(__('Grand Total')); ?></label>
                                            <input type="number" name="total_expense" id="net" readonly
                                                placeholder="net price" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">

                                            <button type="submit" name="submit" class="btn btn-primary"
                                                id="saveExpense"><?php echo e(__('Create Expense')); ?></button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            'use strict'

            var i = 1;
            var printCounter = 0;


            $('#default-datatable').DataTable();


            function nettotalfind() {
                var sum = 0;
                $('.total').each(function() {
                    sum += parseFloat($(this).val());
                });

                $('#net').val(sum);

            }

            $(document).on("keyup", ".qty", function(arg) {

                var id = $(this).attr('id');
                var number = id.split('qty')[1];

                var quantity = $('#qty' + number).val();
                var price = $('#price' + number).val();
                var total = Number(quantity) * Number(price);
                $('#total' + number).val(total);
                nettotalfind();


            });
            $(document).on("keyup", ".price", function(arg) {

                var id = $(this).attr('id');
                var number = id.split('price')[1];

                var quantity = $('#qty' + number).val();
                var price = $('#price' + number).val();
                var total = Number(quantity) * Number(price);
                $('#total' + number).val(total);
                nettotalfind();
            });



            $("#expense-us-form").on("submit", function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#saveExpense').html('Sending..');

                $.ajax({
                    url: "<?php echo e(route('expense.add')); ?>",
                    type: "POST",
                    data: $('#expense-us-form').serialize(),
                    success: (response) => {

                        location.reload();
                        this.reset();
                        $("#expense-us-form")[0].reset();
                        $('#saveExpense').html('Submit');
                        toastr["success"]('Successfully Saved Income')

                    },
                });

            });

            /*---------delete data-----------*/

            $(document).on("click", "#deleteExpenseId", function(e) {
                e.preventDefault();
                let id = $(this).attr('data_id');
                let url = $(this).data('href')
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: url,
                                method: 'POST',
                                success: function(out) {
                                    swal("Deleted", "Data has been Deleted Successfully",
                                        "success");
                                    location.reload();
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });
            });



            $('#add_new').on('click',function() {


                $('#mainbody').append(`
                <div class="row deleteItem">
                  <div class="form-group col-md-12 text-right mb-0">
                    <button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                        <div class="form-group col-md-3">
                            <label for="">Item</label>
                            <input class="item form-control" type="text" name="addmore[${i}][item]"
                                required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Quantity</label>
                            <input class="qty form-control" type="number" name="addmore[${i}][qty]"
                                id="qty${i}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Price</label>
                            <input class="price form-control" type="number" name="addmore[${i}][price]"
                                id="price${i}" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Total</label>
                            <input type="number" name="addmore[${i}][total]" readonly="readonly"
                                id="total${i}" class="total form-control" placeholder="Total">
                        </div>

                    </div>
                    
                    
                    
                    `);

                i++;



            });

            $('#mainbody').on('click', '#remove', function() {
                $(this).closest('.deleteItem').remove();
                nettotalfind();
            });


            $('#AddToList').on('click',function() {
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
           
        });
    </script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/Expensive/expensive_add.blade.php ENDPATH**/ ?>