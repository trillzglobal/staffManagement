<div class="card-body">

    <div class="form-group">
        <label for="category_id">{{__('Select Admin')}}</label>
        <select class="form-control" name="user_id" id="user_id">
            <option value="">{{__('Select Admin')}}</option>
            @foreach ($admin as $admin)

                <option value="{{ $admin->id }}">{{ $admin->name }}</option>

            @endforeach
        </select>

        @error('user_id')<i class="text-danger">{{ $message }}</i>@enderror
    </div>

    <div class="form-group">
        <label for="name">{{__('File Title')}}</label>
        <input type="text" name="title" class="form-control" id="title" value="" placeholder="Enter File Title">
        @error('title')<i class="text-danger">{{ $message }}</i>@enderror
    </div>

    <div class="form-group">
        <label for="description">{{__('Description')}}</label>
        <input type="text" name="description" class="form-control" id="description" value=""
            placeholder="Enter Description">
        @error('description')<i class="text-danger">{{ $message }}</i>@enderror
    </div>

    <div class="form-group">
        <label for="image">{{__('File')}}</label>
        <input type="file" name="file" class="form-control" id="file" value="" placeholder="Upload File ">
        @error('file')<i class="text-danger">{{ $message }}</i>@enderror
    </div>


</div>
<!-- /.card-body -->
