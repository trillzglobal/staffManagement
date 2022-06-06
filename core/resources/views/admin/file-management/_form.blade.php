<div class="card-body">
    <div class="form-group">
        <label for="employee_id">{{__('Select Employee')}}</label>
        <select class="form-control" name="employee_id" id="employee_id">
            @foreach ($users as $user)

                <option @if (old('employee_id', isset($user) ? $user->employee_id : null) == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>

            @endforeach
        </select>

        @error('employee_id')<i class="text-danger">{{ $message }}</i>@enderror
    </div>

    <div class="form-group">
        <label for="title">{{__('Title')}}</label>
        <input type="text" name="title" class="form-control" id="title" value="" placeholder="Enter File Title">
        @error('title')<i class="text-danger">{{ $message }}</i>@enderror
    </div>

    <div class="form-group">
        <label for="description">{{__('Description')}}</label>
        <textarea type="text" name="description" class="form-control" id="description"
            placeholder="Enter File Description"></textarea>
    </div>

    <div class="form-group">
        <label for="file">{{__('File')}}</label>
        <div class="mb-3 input-group">

            <div class="custom-file">
                <input type="file" id="inputGroupFile01" class="custom-file-input" name="file" class="form-control"
                    id="file" value="" placeholder="Upload File ">
                <label class="custom-file-label" for="inputGroupFile01">{{__('Choose file')}}</label>
            </div>
        </div>
        @error('file')<i class="text-danger">{{ $message }}</i>@enderror
    </div>



</div>

