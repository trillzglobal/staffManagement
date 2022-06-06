<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="mb-4 col-xl-4 col-md-4">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="">
                                    <h4 class="font-weight-bolder"><?php echo e(__('Workspace')); ?></h4>
                                    <p><?php echo e($workspace->name); ?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="mb-4 col-xl-4 col-md-4">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="">
                                    <h4 class="font-weight-bolder"><?php echo e(__('Project')); ?></h4>
                                    <p><?php echo e($pro->name); ?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 col-xl-4 col-md-4">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="">
                                    <h4 class="font-weight-bolder"><?php echo e(__('Assigned User')); ?></h4>
                                    <?php $__currentLoopData = $projects->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-primary p-2"><?php echo e($user->name); ?> </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header text-right">
                        <a href="#add_workspace_modal" data-toggle="modal" class="btn btn-primary"> <i
                                class="fa fa-plus"></i> <?php echo e(__('Add
                            Task')); ?></a>
                    </div>

                    <div class="card-body">
                        <div class="tile" id="tile-1">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <div class="slider"></div>
                                <li class="nav-item bg-secondary">
                                    <a class="nav-link active text-white" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true"><i
                                            class="fas fa-spinner mr-2"></i></i><?php echo e(__('In Progress')); ?></a>
                                </li>
                                <li class="nav-item bg-primary">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false"><i class="fas fa-tasks mr-2"></i></i>
                                        <?php echo e(__('To Do')); ?></a>
                                </li>
                                <li class="nav-item bg-success">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false"><i
                                            class="fas fa-check-circle mr-2"></i>
                                        <?php echo e(__('Complete')); ?></a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div id="inprog" class="row">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div id="todo" class="row">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div id="finished" class="row">



                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>



                </div>
            </div>



        </div>
    </div>


    <div id="add_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Add Task')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="taskform" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Task Name')); ?></label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Task Name">
                            <p class="name text-bold text-danger text-small"></p>
                            <input name="workspace_id" id="name" class="form-control" type="hidden"
                                value="<?php echo e($workspace->id); ?>">
                            <input name="project_name" id="name" class="form-control" type="hidden"
                                value="<?php echo e($pro->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Description')); ?></label>
                            <input name="description" id="description" class="form-control" type="text"
                                placeholder="Task Description">
                            <p class="description text-bold text-danger text-small"></p>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('Start Date')); ?>:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input class="form-control" type="date" name="startdate" /> <br>
                                <p class="startdate text-bold text-danger text-small"></p>

                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('End Date')); ?>:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input class="form-control" type="date" name="enddate" /> <br>
                                <p class="enddate text-bold text-danger text-small"></p>

                            </div>
                        </div>
                        <input type="hidden" name="project_id" value="<?php echo e(request()->id); ?>">
                        <div class="form-group">
                            <label for="role"><?php echo e(__('Select Priority')); ?></label>
                            <select class="form-control" name="priority" id="role">

                                <option value="Low"><?php echo e(__('Low')); ?></option>
                                <option value="Middle"><?php echo e(__('Middle')); ?></option>
                                <option value="High"><?php echo e(__('High')); ?></option>

                            </select>
                            <p class="priority text-bold text-danger text-small"></p>


                        </div>



                        <div class="form-group">
                            <label for="role"><?php echo e(__('Status')); ?></label>
                            <select class="form-control" name="status" id="role">

                                <option value="inprogress"><?php echo e(__('In Progress')); ?></option>
                                <option value="todo"><?php echo e(__('To Do')); ?></option>
                                <option value="finished"><?php echo e(__('Finished')); ?></option>

                            </select>
                            <p class="status text-bold text-danger text-small"></p>


                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Assign To')); ?></label>
                            <div class="checkbox">

                                <?php $__currentLoopData = $projects->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <label><input type="checkbox" name="user_id[]" value="<?php echo e($user->id); ?>">
                                        <?php echo e($user->name); ?></label>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>
                        </div>


                        <div class="form-group">
                            <input id="saveBtn" class="btn btn-block btn-primary" type="submit" value="create">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <div id="edit_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Edit Task')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="taskform" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Task Name')); ?></label>
                            <input name="id" id="namey" class="form-control" type="hidden" placeholder="Task Name">

                            <input name="name" id="namey" class="form-control" type="text" placeholder="Task Name">
                            <p class="name text-bold text-danger text-small"></p>
                            <input name="workspace_id" id="name" class="form-control" type="hidden"
                                value="<?php echo e($workspace->id); ?>">
                            <input name="project_name" id="name" class="form-control" type="hidden"
                                value="<?php echo e($pro->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Description')); ?></label>
                            <input name="description" id="description" class="form-control" type="text"
                                placeholder="Task Description">
                            <p class="description text-bold text-danger text-small"></p>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('Start Date')); ?>:</label>
                            <div class="input-group date " id="startdate" data-target-input="nearest">
                                <input class="form-control" type="date" name="startdate" />
                                <p class="tistartdatetle text-bold text-danger text-small"></p>

                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('End Date')); ?>:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input class="form-control" type="date" name="enddate" id="enddate" />
                                <p class="enddate text-bold text-danger text-small"></p>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role"><?php echo e(__('Select Priority')); ?></label>
                            <select class="form-control" name="priority" id="priority">

                                <option value="Low"><?php echo e(__('Low')); ?></option>
                                <option value="Middle"><?php echo e(__('Middle')); ?></option>
                                <option value="High"><?php echo e(__('High')); ?></option>

                            </select>
                            <p class="priority text-bold text-danger text-small"></p>


                        </div>



                        <div class="form-group">
                            <label for="role"><?php echo e(__('Status')); ?></label>
                            <select class="form-control" name="status" id="status">

                                <option value="inprogress"><?php echo e(__('In Progress')); ?></option>
                                <option value="todo"><?php echo e(__('To Do')); ?></option>
                                <option value="finished"><?php echo e(__('Finished')); ?></option>

                            </select>
                            <p class="status text-bold text-danger text-small"></p>


                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Assign To')); ?></label>
                            <div class="checkbox" id="checkbox">


                            </div>

                        </div>


                        <div class="form-group">
                            <input id="edittask" class="btn btn-block btn-primary" type="submit" value="update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="delete_task_modal" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(__('Delete Task')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>

                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" value="" name="taskID">
                        <h5><?php echo e(__('Are You Sure To Delete This Task')); ?>? </h5>
                    </div>
                    <div class="form-group">

                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-danger" id="deletetask"><?php echo e(__('Delete')); ?></button>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .tile {
            width: 100%;
            margin: 60px auto;
        }

        #tile-1 .tab-pane {
            padding: 15px 0;
        }

        #tile-1 .nav-tabs {
            position: relative;
            border: none !important;
            background-color: #fff;
            border-radius: 6px;
        }

        #tile-1 .nav-tabs li {
            margin: 0px !important;
        }

        #tile-1 .nav-tabs li a {
            position: relative;
            margin-right: 0px !important;
            padding: 20px 40px !important;
            font-size: 16px;
            border: none !important;
            color: rgb(255, 255, 255);
        }



        #tile-1 .slider {
            display: inline-block;
            width: 30px;
            height: 4px;
            border-radius: 3px;
            background-color: #281463;
            position: absolute;
            z-index: 1;
            bottom: 0;
            transition: all .4s linear;

        }

        #tile-1 .nav-tabs .active {
            background-color: transparent !important;
            border: none !important;
            color: #ffffff !important;
        }


        .mainbox {
            background-color: #6a2332;
            margin: auto;
            height: 280px;
            width: 100%;
            position: relative;
        }



        .icon-not-found.fas {
            position: absolute;
            font-size: 8.5rem;
            left: 45%;
            top: 10%;
            color: #ffffff;
        }

        .msg {
            text-align: center;
            font-family: "Nunito Sans", sans-serif;
            font-size: 1.6rem;
            position: absolute;
            left: 16%;
            top: 65%;
            width: 75%;

        }

        .msg p {
            color: #fff
        }

    </style>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>

    <script src="<?php echo e(asset('assets/backend/js/sweetalert.min.js')); ?>"></script>


    <script>
        'use strict'
        $(document).ready(function() {
            $("#tile-1 .nav-tabs a").on('click',function() {
                var position = $(this).parent().position();
                var width = $(this).parent().width();
                $("#tile-1 .slider").css({
                    "left": +position.left,
                    "width": width
                });
            });
            var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
            var actPosition = $("#tile-1 .nav-tabs .active").position();
            $("#tile-1 .slider").css({
                "left": +actPosition.left,
                "width": actWidth
            });


            $('#inprog').ready(function() {

               

                $.ajax({
                    type: "get",
                    url: "<?php echo e(route('project.inprogress')); ?>",
                    data:{id:"<?php echo e(request()->id); ?>"},
                    success: function(response) {

                        var appendString = "";

                        if (response.length <= 0) {

                            let appendStringInProgress = `

                            <div class="mainbox">
                                
                                <i class="icon-not-found fas fa-sad-tear"></i>
                            
                                <div class="msg">
                                    <p>No In Progrees Task Is Available </p>
                                </div>
                            </div>

                            `;

                            $('#inprog').empty().append(appendStringInProgress);

                            return;
                        }

                        for (var i = 0; i < response.length; i++) {

                            appendString += `

                            <div class="col-xl-6 col-md-6 col-12 mb-3">
                                            <div class="shadow card h-100">
                                                <div class="card-header bg-primary">
                                                    <p class="text-white text-center">${response[i].name}</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="">
                                                        <p>${response[i].description}</p>
    
                                                        <table class="table table-bordered text-center w-100">
                                                            <tr>
                                                                <th class="bg-success text-white">Start Date</th>
                                                                <th class="bg-danger text-white">End Date</th>
                                                                <th class="bg-primary text-white">Priority</th>
                                                            </tr>
                                                            <tr>
                                                                <td>${response[i].startdate}</td>
                                                                <td>${response[i].enddate}</td>
                                                                <td>
                                                                    ${response[i].priority}
                                                                </td>
                                                            </tr>
                                                        </table>
    
                                                        <p>
                                                            Project Assigned To:
                                                            <br>
                                                            <span class="badge badge-primary p-2">
                                                            `;
                            response[i].assign_to != null ?
                                JSON.parse(response[i].assign_to).map((val) => {
                                    appendString += val.name;
                                }) :
                                '';
                            appendString += `</span>
                                                           
                                                        </p>
    
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button class="btn btn-primary" data-id="${response[i].id}" data-toggle="modal" id="edit"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-danger" data-id="${response[i].id}" data-toggle="modal" id="delete"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                            `;

                        }

                        $('#inprog').empty().append(appendString);
                    },
                    error: function(error) {

                    }
                })



            })




            $('#todo').ready(function() {


                $.ajax({
                    type: "get",
                    url: "<?php echo e(route('project.todo')); ?>",
                    dataType: "json",
                    data:{id:"<?php echo e(request()->id); ?>"},
                    success: function(response) {
                       
                        var appendString = "";
                        if (response.length <= 0) {

                            appendString = `

                            <div class="mainbox">
                                
                                <i class="icon-not-found fas fa-sad-tear "></i>
                               
                                <div class="msg">
                                    <p>No Todo Task Is Available</p>
                                </div>
                            </div>
                            
                            `;

                            $('#todo').empty().append(appendString);

                            return;
                        }

                        for (var i = 0; i < response.length; i++) {


                            appendString += `

                            <div class="col-xl-6 col-md-6 mb-3">
                                            <div class="shadow card h-100">
                                                <div class="card-header bg-primary">
                                                    <p class="text-white text-center">${response[i].name}</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="">
                                                        <p>${response[i].description}</p>
    
                                                        <table class="table table-bordered text-center w-100">
                                                            <tr>
                                                                <th class="bg-success text-white">Start Date</th>
                                                                <th class="bg-danger text-white">End Date</th>
                                                                <th class="bg-primary text-white">Priority</th>
                                                            </tr>
                                                            <tr>
                                                                <td>${response[i].startdate}</td>
                                                                <td>${response[i].enddate}</td>
                                                                <td>
                                                                    ${response[i].priority}
                                                                </td>
                                                            </tr>
                                                        </table>
    
                                                        <p>
                                                            Project Assigned To:
                                                            <br>
                                                            <span class="badge badge-primary p-2">
                                                            `;
                            response[i].assign_to != null ?
                                JSON.parse(response[i].assign_to).map((val) => {
                                    appendString += val.name;
                                }) :
                                '';
                            appendString += `</span>
                                                           
                                                        </p>
    
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button class="btn btn-primary" data-id="${response[i].id}" data-toggle="modal" id="edit"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-danger" data-id="${response[i].id}" data-toggle="modal" id="delete"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                            `;


                        }

                       
                        $('#todo').empty().append(appendString);
                    },
                    error: function(error) {

                    }
                })



            })



            $('#finished').ready(function() {


                $.ajax({
                    type: "get",
                    url: "<?php echo e(route('project.finished')); ?>",
                    dataType: "json",
                    data:{id:"<?php echo e(request()->id); ?>"},
                    success: function(response) {
                        var appendString = "";
                        if (response.length <= 0) {

                            appendString = `

                            <div class="mainbox">
                                
                                <i class="icon-not-found fas fa-sad-tear"></i>

                                <div class="msg">
                                    <p>No In Complete Task Is Available </p>
                                </div>
                            </div>

                            `;

                            $('#finished').empty().append(appendString);

                            return;
                        }
                        for (var i = 0; i < response.length; i++) {

                            appendString += `

                            <div class="col-xl-6 col-md-6 mb-3">
                                            <div class="shadow card h-100">
                                                <div class="card-header bg-primary">
                                                    <p class="text-white text-center">${response[i].name}</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="">
                                                        <p>${response[i].description}</p>
    
                                                        <table class="table table-bordered text-center w-100">
                                                            <tr>
                                                                <th class="bg-success text-white">Start Date</th>
                                                                <th class="bg-danger text-white">End Date</th>
                                                                <th class="bg-primary text-white">Priority</th>
                                                            </tr>
                                                            <tr>
                                                                <td>${response[i].startdate}</td>
                                                                <td>${response[i].enddate}</td>
                                                                <td>
                                                                    ${response[i].priority}
                                                                </td>
                                                            </tr>
                                                        </table>
    
                                                        <p>
                                                            Project Assigned To:
                                                            <br>
                                                            <span class="badge badge-primary p-2">
                                                            `;
                            response[i].assign_to != null ?
                                JSON.parse(response[i].assign_to).map((val) => {
                                    appendString += val.name;
                                }) :
                                '';
                            appendString += `</span>
                                                           
                                                        </p>
    
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <button class="btn btn-primary" data-id="${response[i].id}" data-toggle="modal" id="edit"><i class="fa fa-pen"></i></button>
                                                    <button class="btn btn-danger" data-id="${response[i].id}" data-toggle="modal" id="delete"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                            `;


                        }

                        $('#finished').empty().append(appendString);
                    },
                    error: function(error) {
                        console.log(error)
                        alert('not saved');
                    }
                })



            })

            $("#taskform").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('task.store')); ?>",
                    method: "POST",
                    ContentType: false,
                    proccessData: false,
                    data: $("#taskform").serialize(),
                    success: function(response) {
                        
                        $("#add_workspace_modal").modal('hide')
                        location.reload();
                        swal("Good job!", "Project Created", "success");

                    },
                    error: function(response) {
                        if (response.responseJSON.errors.name) {
                            response.responseJSON.errors.name.forEach(title => {
                                $('#taskform .name').text(title);
                            });
                        }
                        if (response.responseJSON.errors.priority) {
                            response.responseJSON.errors.priority.forEach(title => {
                                $('#taskform .priority').text(title);
                            });
                        }
                        if (response.responseJSON.errors.description) {
                            response.responseJSON.errors.description.forEach(title => {
                                $('#taskform .description').text(title);
                            });
                        }
                        if (response.responseJSON.errors.startdate) {
                            response.responseJSON.errors.startdate.forEach(title => {
                                $('#taskform .startdate').text(title);
                            });
                        }
                        if (response.responseJSON.errors.enddate) {
                            response.responseJSON.errors.enddate.forEach(title => {
                                $('#taskform .enddate').text(title);
                            });
                        }
                        if (response.responseJSON.errors.status) {
                            response.responseJSON.errors.status.forEach(title => {
                                $('#taskform .status').text(title);
                            });
                        }

                    }
                })


            })

            $(document).on('click', '#delete', function() {
                

                let id = $(this).attr('data-id');
                $('#delete_task_modal input[name="taskID"]').val(id);

               
                $('#delete_task_modal').modal('show');
            })



            $(document).on('click', '#deletetask', function(e) {
                e.preventDefault();
                let id = $('#delete_task_modal input[name="taskID"]').val();

                let url = "<?php echo e(route('task.delete',':id')); ?>";

                url = url.replace(':id', id);

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
                        $('#delete_task_modal').modal('hide');
                        location.reload();
                        swal("Good job!", "Task Deleted", "success");
                    },
                    error: function(response) {
                        
                    }
                });

            })

            //edit

            $(document).on('click', '#edit', function(e) {
                e.preventDefault();
                $('#edit_workspace_modal').modal('show');
                let id = $(this).attr('data-id');

                let url = "<?php echo e(route('task.edit',':id')); ?>";
                url = url.replace(':id', id);
                $('#edit_workspace_modal input[name="id"]').val(id);
                $('#checkbox').empty();
             
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {

                        $('#edit_workspace_modal input[name="name"]').val(data[0].name);
                        $('#edit_workspace_modal input[name="description"]').val(data[0]
                            .description);
                        $('#edit_workspace_modal input[name="startdate"]').val(data[0]
                            .startdate);
                        $('#edit_workspace_modal input[name="enddate"]').val(data[0].enddate);
                        $('#edit_workspace_modal select[name="priority"]').val(data[0].priority);
                        $('#edit_workspace_modal select[name="status"]').val(data[0].status);
                        for (var i = 0; i < JSON.parse(data[0].assign_to).length; i++) {
                           
                            $('#checkbox').append(`<input type="checkbox" name="user_id[]"  value="${data[0].user_id}" checked>${JSON.parse(data[0].assign_to)[i].name}
                <br>`);
                        }

                       
                    },
                    error: function(data) {
                       
                    }
                });

            });

            $(document).on('click', '#edittask', function(e) {
                e.preventDefault();


                let id = $('#edit_workspace_modal input[name="id"]').val();


                let url = "<?php echo e(route('task.update',':id')); ?>";
                url = url.replace(':id', id);

                let name = $("#edit_workspace_modal input[name=name]").val();
                let description = $("#edit_workspace_modal input[name=description]").val();

                let status = $("#status").val();

                let priority = $("#priority").val();
                let startdate = $("#edit_workspace_modal input[name=startdate]").val();
                let enddate = $("#edit_workspace_modal input[name=enddate]").val();
                let userid = $("#edit_workspace_modal input[name=user_id").val();



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
                        'name': name,
                        'description': description,
                        'status': status,
                        'priority': priority,
                        'status': status,
                        'startdate': startdate,
                        'enddate': enddate,
                        'user_id': userid
                    },
                    success: function(response) {
                        console.log(response);
                        $('#edit_LeaveType_modal').modal('hide');
                        swal("Good job!", "Task Edited", "success");
                        location.reload();

                    },
                    error: function(response) {
                       
                    }
                });


            });

        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/task/index.blade.php ENDPATH**/ ?>