<?php

use App\Http\Controllers\InstallerController;
use App\Http\Controllers\LanguageController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('language', 'Admin\LanguageController@index')->name('admin.language');
    Route::post('language', 'Admin\LanguageController@store');
    Route::post('language/edit/{id}', 'Admin\LanguageController@update')->name('language.edit');
    Route::post('language/delete/{id}', 'Admin\LanguageController@delete')->name('language.delete');
    Route::get('language/translator/{lang}', 'Admin\LanguageController@transalate')->name('language.translator');

    Route::post('language/translator/{lang}', 'Admin\LanguageController@transalateUpate');
    Route::get('language/import', 'Admin\LanguageController@import')->name('language.import');

    Route::get('changeLang', 'Admin\DashboardController@changeLang')->name('changeLang');


    Route::get('sitename', 'Admin\DashboardController@sitename')->name('sitename');
    Route::post('sitename', 'Admin\DashboardController@sitenameUpdate');

    Route::get('timezone/', 'Admin\DashboardController@timeview')->name('admin.time.index');
    Route::post('timezone/', 'Admin\DashboardController@timezone')->name('admin.time');

    Route::get('admin/logo', 'Admin\DashboardController@logo')->name('logo');

    Route::post('admin/logo', 'Admin\DashboardController@logostore')->name('logo.store');

    Route::get('admin/signature', 'Admin\DashboardController@signature')->name('signature.create');

    Route::post('admin/signature', 'Admin\DashboardController@signaturestore')->name('signature.store');

    Route::get('admin/copyright', 'Admin\DashboardController@copyright')->name('copyright');

    Route::post('admin/copyright', 'Admin\DashboardController@copyrightstore')->name('copyright.store');

    Route::get('admin/shift', 'Admin\DashboardController@shift')->name('shift');

    Route::post('admin/shift', 'Admin\DashboardController@shiftStore');

    Route::get('email/config', 'Admin\DashboardController@emailConfig')->name('email.config');
    Route::post('email/config', 'Admin\DashboardController@emailConfigUpdate');


    Route::group(['prefix' => 'invoice'], function () {
        Route::get('/', 'Admin\InvoiceController@index')->name('invoice.index');
        Route::post('/add', 'Admin\InvoiceController@store')->name('invoice.add');
        Route::get('/{id}', 'Admin\InvoiceController@show')->name('invoice.view');
        Route::get('/email/{id}', 'Admin\InvoiceController@email')->name('invoice.email');
        Route::get('/edit/{id}', 'Admin\InvoiceController@edit')->name('invoice.edit');
        Route::post('/update/{id}', 'Admin\InvoiceController@update')->name('invoice.update');
        Route::get('delete/{id}', 'Admin\InvoiceController@destroy')->name('invoice.delete');
    });


    Route::resource('admin/client', 'Admin\ClientController');


    Route::get('file/download/{file?}', 'Admin\DownloadController@download')->name('file.download');



    Route::post('admin/selfattendance', 'Admin\DashboardController@storeattendance')->name('selfattendance');
    Route::post('admin/selfattendanceout', 'Admin\DashboardController@updateattendance')->name('selfattendanceout');

    Route::get('admin/user', 'Admin\UserController@userIndex')->name('admin.userIndex');
    Route::get('admin/user/delete/{id}', 'Admin\UserController@destroy')->name('admin.destroy');

    //UserCreate
    Route::get('admin/user/registration', 'Admin\UserController@employeeRegistration')->name('admin.userCreate');
    Route::post('admin/user/registration', 'Admin\UserController@store')->name('admin.userCreate');

    //userIndexList
    Route::get('admin/user/list', 'Admin\UserController@employeeInactiveList')->name('admin.inactive');

    //ManageEmployee
    Route::get('admin/manage-employee', 'Admin\EmployeeController@employeeIndex')->name('admin.employeeIndex');
    Route::get('admin/manage-employee/view/{id}', 'Admin\EmployeeController@employeeView')->name('admin.employeeView');
    Route::get('admin/manage-employee/edit/{id}', 'Admin\EmployeeController@employeeEdit')->name('admin.employeeEdit');
    Route::post('admin/manage-employee/edit/{id}', 'Admin\EmployeeController@employeeUpdate')->name('admin.employeeEdit');
    Route::get('admin/manage-employee/nid/download/{id}', 'Admin\EmployeeController@nidDownload')->name('admin.nid.download');

    //Employee Disable
    Route::get('admin/manage-employee/disable/{id}', 'Admin\EmployeeController@employeeDisable')->name('admin.employeeDisable');
    Route::post('admin/manage-employee/delete/{id}', 'Admin\EmployeeController@EmployeeDelete')->name('admin.EmployeeDelete');

    //Event Management
    Route::get('fullcalender', 'Admin\EventController@index')->name('admin.event');
    Route::post('fullcalenderAjax', 'Admin\EventController@ajax')->name('admin.eventAjax');


    Route::get('admin/profile/{id}', 'Admin\EmployeeController@employeeView')->name('admin.profile');
    Route::get('admin/password/change/{id}', 'Admin\EmployeeController@passwordChange')->name('admin.pssword.change');
    Route::post('admin/password/change/{id}', 'Admin\EmployeeController@passwordUpdate')->name('admin.password.change');



    Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('admin/user/edit/{id}', 'Admin\UserController@edit')->name('admin.useredit');
    Route::post('admin/user/edit', 'Admin\UserController@update')->name('admin.updateuser');
    Route::get('admin/attendance', 'Admin\AttendanceController@index')->name('admin.attendancelist');
    Route::get('admin/attendanceform', 'Admin\AttendanceController@attendanceform')->name('admin.attendanceform');
    Route::post('admin/attendanceform', 'Admin\AttendanceController@store')->name('admin.attendancestore');
    Route::post('admin/attendancetimeout', 'Admin\AttendanceController@update')->name('admin.attendanceupdate');

    //payroll
    Route::get('admin/addpayroll', 'Admin\PayrollController@addpayroll')->name('admin.addpayroll');
    Route::get('admin/payrolllist', 'Admin\PayrollController@index')->name('admin.payrolllist');
    Route::get('admin/payment/{id}', 'Admin\PayrollController@payment')->name('admin.addpayment');
    Route::post('admin/payment/{id}', 'Admin\PayrollController@filterbydate')->name('admin.filterbydate');
    Route::post('admin/pay/{id}', 'Admin\PayrollController@store')->name('admin.pay');
    Route::get('admin/payment/edit/{id}', 'Admin\PayrollController@edit')->name('admin.paymentedit');
    Route::post('/admin/payment/edit/{id}', 'Admin\PayrollController@update')->name('admin.paymentupdate');
    Route::get('admin/payment/delete/{id}/{uid}', 'Admin\PayrollController@destroy')->name('admin.paymentdelete');

    Route::get('admin/workspace', 'Admin\WorkspaceController@index')->name('workspace.index');
    Route::get('admin/workspacetable', 'Admin\WorkspaceController@workspacetable')->name('workspace.all');
    Route::get('admin/editworkspace/{id}', 'Admin\WorkspaceController@edit')->name('workspace.edit');
    Route::post('admin/editworkspace/{id}', 'Admin\WorkspaceController@update');

    Route::post('admin/addworkspace', 'Admin\WorkspaceController@store')->name('workspace.add');
    Route::post('admin/deleteworkspace/{id}', 'Admin\WorkspaceController@delete')->name('deleteworkspace');


    Route::get('admin/projecttable/{id}', 'Admin\ProjectController@projecttable')->name('projecttable');
    Route::get('admin/workspace/view/{id}', 'Admin\ProjectController@index');


    Route::post('admin/addproject', 'Admin\ProjectController@store')->name('project.add');
    Route::post('admin/deleteproject/{id}', 'Admin\ProjectController@delete')->name('project.delete');
    Route::get('admin/editproject/{id}', 'Admin\ProjectController@edit')->name('project.edit');
    Route::post('admin/updateproject/{id}', 'Admin\ProjectController@update')->name('project.update');

    Route::get('admin/workspace/{wid}/project/view/{id}', 'Admin\ProjectController@projectview')->name('project.view');

    Route::post('admin/addtask', 'Admin\TaskController@store')->name('task.store');
    Route::get('admin/inprogtask', 'Admin\TaskController@inprogress')->name('project.inprogress');
    Route::get('admin/todo', 'Admin\TaskController@todo')->name('project.todo');
    Route::get('admin/finished', 'Admin\TaskController@finished')->name('project.finished');
    Route::get('admin/edittask/{id}', 'Admin\TaskController@edit')->name('task.edit');
    Route::post('admin/deletetask/{id}', 'Admin\TaskController@delete')->name('task.delete');
    Route::post('admin/updatetask/{id}', 'Admin\TaskController@update')->name('task.update');



    Route::resource('admin/file-management', 'Admin\FileManagementController');

    Route::get('admin/sending/files', 'Admin\FileManagementController@sendingList')->name('admin.sending-list');
    Route::get('admin/receiving/files', 'Admin\FileManagementController@receivingList')->name('admin.receiving-list');

    Route::resource('admin/client', 'Admin\ClientController');

    Route::get('admin/register-client', 'Admin\RegisterClientController@show')->name('register-client.info');
    Route::post('files/delete-all', 'Admin\DeleteAllController@delete')->name('delete.all');
    Route::post('files/delete-all', 'Admin\DeleteAllController@delete')->name('delete.all');



    Route::group(['prefix' => 'department'], function () {
        Route::get('/', 'DepartmentsController@index')->name('department.index');
        Route::get('/create', 'DepartmentsController@create')->name('department.create');
        Route::post('/store', 'DepartmentsController@store')->name('department.store');
        Route::get('/edit/{id}', 'DepartmentsController@edit')->name('department.edit');
        Route::post('/update/{id}', 'DepartmentsController@update')->name('department.update');
        Route::get('/delete/{id}', 'DepartmentsController@delete')->name('department.delete');
    });

    Route::get('/category/show/', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('category.show');
    Route::post('/category/save', [App\Http\Controllers\Category\CategoryController::class, 'store'])->name('category.save');
    Route::post('/category/delete/{id}', [App\Http\Controllers\Category\CategoryController::class, 'destroy'])->name('category.delete');

    Route::post('/category/udpate/{id}', [App\Http\Controllers\Category\CategoryController::class, 'update'])->name('category.update');


    Route::get('/expense/', [App\Http\Controllers\Expensive\ExpensiveController::class, 'create'])->name('expense.create');
    Route::post('/expense/add', [App\Http\Controllers\Expensive\ExpensiveController::class, 'store'])->name('expense.add');
    Route::get('/expense/view', [App\Http\Controllers\Expensive\ExpensiveController::class, 'index'])->name('expense.view');
    Route::post('/expense/delete/{id}', [App\Http\Controllers\Expensive\ExpensiveController::class, 'destroy'])->name('expense.delete');


    Route::get('/income/', [App\Http\Controllers\Income\IncomeController::class, 'create']);
    Route::post('/income/insert', [App\Http\Controllers\Income\IncomeController::class, 'store'])->name('income.insert');
    Route::get('/income/get', [App\Http\Controllers\Income\IncomeController::class, 'index'])->name('income.get');
    Route::get('/income/views/', [App\Http\Controllers\Income\IncomeController::class, 'viewdata']);
    Route::get('/income/deleted/', [App\Http\Controllers\Income\IncomeController::class, 'destroy']);


    Route::get('admin/assetType', 'Admin\AssetController@AssetTypeView')->name('admin.assetType');
    Route::get('admin/assetTypeTable', 'Admin\AssetController@AssetTypeTable')->name('admin.asset.get');

    Route::post('admin/add-assetType', 'Admin\AssetController@addAssetType')->name('admin.assetTypeTable');
    Route::post('admin/delete-assetType/{id}', 'Admin\AssetController@destroy')->name('admin.delete-assetType');

    Route::get('admin/edit-assetType/{id}', 'Admin\AssetController@editAssetType')->name('admin.ediit-assetType');
    Route::post('admin/edit-assetType/{id}', 'Admin\AssetController@updateAssetType')->name('admin.update-assetType');


    Route::get('admin/equipmentTable', 'Admin\AssetController@equipmentTable')->name('admin.equipmentTable');

    Route::post('admin/add-equipment', 'Admin\AssetController@addEquipment')->name('admin.add-equipment');
    Route::post('admin/delete-equipment/{id}', 'Admin\AssetController@deleteEquipment')->name('admin.delete-equipment');
    Route::get('admin/edit-equipment/{id}', 'Admin\AssetController@editEquipment')->name('admin.edit-equipment');
    Route::post('admin/edit-equipment/{id}', 'Admin\AssetController@updateEquipment')->name('admin.update-equipment');


    //Leave
    Route::get('admin/addLeaveType', function () {
        return view('admin/leave/addLeaveType');
    })->name('admin.addLeaveType');

    Route::get('admin/LeaveTypeTable', 'Admin\LeaveController@LeaveTypeTable')->name('admin.leave.index');
    Route::post('admin/leaveType/add', 'Admin\LeaveController@addLeaveType')->name('admin.leave.store');



    Route::get('admin/leaveRequeste', function () {
        return view('admin/leave/leaveRequest');
    })->name('admin.leaveRequest');


    Route::get('admin/LeaveRequestTable', 'Admin\LeaveController@leaveRequestTable')->name('admin.leave.req');


    Route::post('admin/approve-LeaveRequest/{id}', 'Admin\LeaveController@approveLeaveRequest')->name('admin.approve-leaveRequest');

    Route::post('admin/decline-LeaveRequest/{id}', 'Admin\LeaveController@declineLeaveRequest')->name('admin.decline-leaveRequest');


    Route::post('admin/delete-leaveType/{id}', 'Admin\LeaveController@deleteLeaveType')->name('admin.delete-leaveType');

    //leavrType Edit

    Route::get('admin/edit-LeaveType/{id}', 'Admin\LeaveController@editLeaveType')->name('admin.edit-leaveType');

    Route::post('admin/edit-LeaveType/{id}', 'Admin\LeaveController@updateLeaveType');




    Route::get('admin/equipment', 'Admin\AssetController@equipmentView')->name('admin.equipment');
    Route::post('admin/equipment', 'Admin\AssetController@addEquipment')->name('admin.equipment');

    Route::get('admin/assetAssignment', function () {
        return view('admin/asset/assetAssignment');
    })->name('admin.assetAssignment');

    Route::get('admin/assetList', 'Admin\AssetController@index')->name('admin.assetList');


    Route::get('admin/addDepartment', function () {
        return view('admin/department/department');
    })->name('admin.addDepartment');

    Route::get('admin/departmentTable', 'Admin\DepartmentController@DepartmentTable')->name('admin.department');

    Route::post('admin/add-department', 'Admin\DepartmentController@addDepartment');
    //
    Route::post('admin/delete-department/{id}', 'Admin\DepartmentController@deleteDepartment')->name('admin.delete-department');
    Route::get('admin/edit-department/{id}', 'Admin\DepartmentController@editDepartment')->name('admin.edit-department');
    Route::post('admin/edit-department/{id}', 'Admin\DepartmentController@updateDepartment')->name('admin.update-department');


    Route::get('admin/markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('admin.markread');

    //Designation
    Route::get('admin/addDesignation', function () {
        return view('admin/department/designation');
    })->name('admin.addDesignation');

    Route::get('admin/designationTable', 'Admin\DepartmentController@designationTable');

    Route::post('admin/add-designation', 'Admin\DepartmentController@adddesignation');
    //
    Route::post('admin/delete-designation/{id}', 'Admin\DepartmentController@deletedesignation')->name('admin.delete-designation');
    Route::get('admin/edit-designation/{id}', 'Admin\DepartmentController@editdesignation')->name('admin.edit-designation');
    Route::post('admin/edit-designation/{id}', 'Admin\DepartmentController@updatedesignation')->name('admin.update-designation');

    Route::get('our_backup_database', 'Admin\DashboardController@our_backup_database')->name('our_backup_database');


    Route::get('filedownload/{file}', 'Download\DownloadController@fileDownload')->name('download.file');
});




Route::middleware(['auth', 'Employee'])->group(function () {

    Route::get('employee/dashboard', 'Employee\DashboardController@index')->name('employee.dashboard');
    Route::get('employee/file-managment', 'Employee\FileManagementController@index')->name('employee.files.index');
    Route::post('employee/file', 'Employee\FileManagementController@store')->name('employee.files.store');
    Route::get('employee/file-list/{id}', 'Employee\FileManagementController@show')->name('empolyee.files');

    Route::delete('employee/file/delete/{id}', 'Employee\FileManagementController@destroy')->name('empolyee.files.delete');

    Route::get('/sending/files', 'Employee\FileManagementController@sendingList')->name('user-sending-list');
    Route::get('/receiving/files', 'Employee\FileManagementController@receivingList')->name('user-receiving-list');



    Route::get('employee/attendance', 'Employee\AttendanceController@index')->name('employee.attendancelist');
    Route::get('employee/attendanceform', 'Employee\AttendanceController@attendanceform')->name('employee.attendanceform');
    Route::post('employee/attendanceform', 'Employee\AttendanceController@store')->name('employee.attendancestore');
    Route::post('employee/attendancetimeout', 'Employee\AttendanceController@update')->name('employee.attendanceupdate');


    Route::get('employee/leave', 'Employee\LeaveController@index')->name('empolyee.leave');


    Route::get('employee/LeaveRequestTable/{id}', 'Employee\LeaveController@LeaveRequestTable')->name('employee.leave.req');


    Route::post('employee/add-leaveRequest', 'Employee\LeaveController@addLeaveRequest')->name('employee.add-leaveRequest');


    Route::get('employee/edit-LeaveRequest/{id}', 'Employee\LeaveController@editLeaveRequest')->name('employee.edit-leaveRequest');
    Route::post('employee/edit-LeaveRequest/{id}', 'Employee\LeaveController@updateLeaverequest');


    Route::get('employee/changeLang', 'Employee\DashboardController@changeLang')->name('employee.changeLang');

    Route::post('employee/delete-leaveRequest/{id}', 'Employee\LeaveController@deleteLeaveRequest')->name('employee.delete-leaveRequest');


    Route::get('employee/tasks', 'Employee\TaskController@index')->name('employee.tasks');


    Route::get('employee/profile', 'Employee\ProfileController@index')->name('employee.profile');
    Route::get('employee/edit/{id}', 'Employee\ProfileController@edit')->name('employee.edit');
    Route::post('employee/edit/{id}', 'Employee\ProfileController@update')->name('employee.edit');
    Route::get('employee/password/change/{id}', 'Employee\ProfileController@passwordChange')->name('employee.pssword.change');
    Route::post('employee/password/change/{id}', 'Employee\ProfileController@passwordUpdate')->name('employee.password.change');


    Route::get('markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markread');
    Route::get('employee/file-download/{file}', 'Employee\DownloadController@download')->name('employee.file.download');
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('admin');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->middleware('clint');




Route::view('accessdenied', 'errors.access')->name('accessdenied');


Route::get('/download/{id}', 'Admin\InvoiceController@download')->name('invoice.download');
