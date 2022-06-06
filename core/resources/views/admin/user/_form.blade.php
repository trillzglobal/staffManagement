<div class="card-body">
    <div class="form-group">
        <label for="name">{{__('Name')}}</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name', isset($user)?$user->name:null)}}" placeholder="Enter User Name">
        @error('name')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="email">{{__('Email')}}</label>
        <input type="email" name="email" class="form-control" id="email" value="{{old('email', isset($user)?$user->email:null)}}" placeholder="Enter User Email">
        @error('email')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="password">{{__('Password')}}</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter User password">
        @error('password')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="role">{{__('Select Role')}}</label>
        <select class="form-control" name="role" id="role">
            <option value="role">{{__('Select Role')}}</option>

            <option  value="admin">{{__('Admin')}}</option>
            <option  value="employee">{{__('Employee')}}</option>

        </select>


</div>

<div class="form-group">
    <label for="status">{{__('Select Status')}}</label>
    <select class="form-control" name="status"  required>
        <option>{{__('Select Status')}}</option>

        <option  value="1">{{__('Enabled')}}</option>
        <option  value="0">{{__('Disabled')}}</option>

    </select>

@error('status')<i class="text-danger">{{$message}}</i>@enderror
</div>


