<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <div class="mb-4 shadow card">

            <div class="card-header text-right">
                <a class="btn btn-sm btn-primary " data-toggle="modal" href="#add_workspace_modal"> <i
                        class="fa fa-plus"></i> <?php echo e(__('Add New Workspace')); ?></a>
            </div>

            <div class="card-body">

                <div class="row">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="workspaceDT" cellspacing="0">
                            <thead>
                                <tr>

                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>

                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <div id="add_workspace_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="workspaceform" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Add Workspace')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input name="name" id="name" class="form-control" type="text" placeholder="Workspace Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input id="saveBtn" class="btn btn-block btn-primary" type="submit" value="create">
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>


    <div id="edit_workspace_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="workspaceform" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Edit Workspace')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input name="id" id="name" class="form-control" type="hidden" placeholder="Workspace Name">
                            <input name="name" id="name" class="form-control" type="text" placeholder="Workspace Name">
                        </div>


                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <input id="edit" class="btn btn-block btn-primary" type="submit" value="Update">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div id="delete_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Delete Workspace')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>

                    <div class="form-group">
                        <input type="hidden" value="" name="workspaceID">
                        <h4><?php echo e(__('Are You Sure')); ?>? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteworkspace" class="btn btn-block btn-primary" type="submit" value="Delete">
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {  
            'use strict'
            var tableLoad = $('#workspaceDT').DataTable({
                ajax: "<?php echo e(route('workspace.all')); ?>",
                columns: [{
                        "data": "name"
                    },

                    {
                        "data": null,
                        render: function(data, type, row) {
                            return [`<a class="btn btn-sm btn-primary" href="workspace/view/${row.id}" data-id="${row.id}"><i class="fa fa-eye text-white" aria-hidden="true" data-toggle="modal" href="#" id="editAssetTypeModal"></i></a>`,
                                `<a class="btn btn-sm btn-primary" data-id="${row.id}"  id="editWorkspaceModal"><i class="fa fa-pen text-white" aria-hidden="true" data-toggle="modal" ></i></a>`,
                                `<a class="btn btn-sm btn-danger"  data-id="${row.id}" id="deleteWorkspaceModal"><i class="fa fa-times text-white" aria-hidden="true" data-toggle="modal"  ></i></a>`
                            ];
                        }
                    }

                ]
            });





            $("#workspaceform").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?php echo e(route('workspace.add')); ?>",
                    data: $("#workspaceform").serialize(),
                    success: function(response) {
                        $("#add_workspace_modal").modal('hide')
                        tableLoad.ajax.reload();
                        toastr.success(response.success)

                    },
                    error: function(error) {
                        toastr.error(error.success)
                    }
                })


            })



            $(document).on('click', '#deleteWorkspaceModal', function() {
               

                let workspaceid = $(this).attr('data-id');
                $('#delete_workspace_modal input[name="workspaceID"]').val(workspaceid);


                $('#delete_workspace_modal').modal('show');
            })



            $(document).on('click', '#deleteworkspace', function(e) {
                e.preventDefault();
                let workspaceid = $('#delete_workspace_modal input[name="workspaceID"]').val();


                var url = "<?php echo e(route('deleteworkspace', ':url')); ?>";
                url = url.replace(':url', workspaceid);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: "json",
                    success: function(response) {
                        $('#delete_workspace_modal').modal('hide');
                        tableLoad.ajax.reload();
                        swal("Good job!", "Workspace Deleted", "success");
                    },
                    error: function(response) {

                    }
                });


            });


            $(document).on('click', '#editWorkspaceModal', function(e) {
                e.preventDefault();
                $('#edit_workspace_modal').modal('show');
                let id = $(this).attr('data-id');
                $('#edit_workspace_modal input[name="id"]').val(id);


                


                var url = "<?php echo e(route('workspace.edit', ':url')); ?>";
                url = url.replace(':url', id);

              
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {
                        $('#edit_workspace_modal input[name="name"]').val(data.name);
                    }
                });

            });

            $(document).on('click', '#edit', function(e) {
                e.preventDefault();

                let id = $('#edit_workspace_modal input[name="id"]').val();
                let name = $('#edit_workspace_modal input[name="name"]').val();


                var url = "<?php echo e(route('workspace.edit', ':url')); ?>";
                url = url.replace(':url', id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'id': id,
                        'name': name

                    },
                    success: function(response) {
                        
                        $('#edit_workspace_modal').modal('hide');
                        tableLoad.ajax.reload();
                        toastr.success(response.success)
                    },
                    error: function(response) {
                        
                    }
                });


            });

        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/workspace/index.blade.php ENDPATH**/ ?>