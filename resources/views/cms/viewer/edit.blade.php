@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New Viewer')

@section('sub-title', 'Create')



@section('style')
@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Viewer</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="row">

                                    <div class="form-groub col-md-12">
                                        <label for="firstname">Viewer First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                            placeholder="Enter Viewer First Name" value="{{ $viewers->user->firstname }}">
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-groub col-md-12">
                                        <label for="lastname">Viewer Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                            placeholder="Enter Viewer Last Name"value="{{ $viewers->user->lastname }}">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-groub col-md-12">
                                        <label for="email">Email Viewer</label>
                                        <input type="eamil" class="form-control" id="email" name="email"
                                            placeholder="Enter Viewer Email"value="{{ $viewers->email }}">
                                    </div>
                                    <br>

                                    {{-- <div class="form-groub col-md-12">
                                        <label for="password">viewer Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter viewer password" value="{{ $viewers->password }}">
                                    </div> --}}
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="mobile">Mobile Viewer</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter viewer mobile" value="{{ $viewers->user->mobile }}">
                                    </div>
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="date">Date of Birth</label>
                                        <input type="date" class="form-control" id="date" name="passdateword"
                                            placeholder="Enter Date of Birth" value="{{ $viewers->user->date }}">
                                    </div>
                                    <br>

                                    {{-- <div class="form-group col-md-12">
                                        <label>Country Name</label>
                                        <select class="form-control select2" id="country_id" name="country_id"
                                            style="width: 100%;">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-12">
                                        <label>City Name</label>
                                        <select class="form-control select2" id="city_id" name="city_id"
                                            style="width: 100%;">
                                            @foreach ($cities as $city)
                                                <option @if ($viewers->user->city_id == $city->id) checked @endif
                                                    value="{{ $city->id }}">
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-select form-select-sm">
                                            <option value="male" @if ($viewers->user->gender == 'male') checked @endif>Male
                                            </option>
                                            <option value="female" @if ($viewers->user->gender == 'female') checked @endif>>Female
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-select form-select-sm">
                                            <option value="active" @if ($viewers->user->status == 'active') checked @endif>Active
                                            </option>
                                            <option value="inactive" @if ($viewers->user->status == 'inactive') checked @endif>
                                                InActive</option>
                                        </select>
                                    </div>

                                    <div class="form-groub col-md-12">
                                        <label for="image">Choose image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Choose image">
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                                <button type="button" onclick="performUpdate({{ $viewers->id }})"
                                    class="btn btn-primary">Update</button> <a href="{{ route('viewers.index') }}"
                                    type="submit" class="btn btn-info">Go Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')


    <script>
        function performUpdate(id) {
            let formData = new FormData();
            // الترتيب مش مهم
            formData.append('firstname', document.getElementById('firstname').value);
            formData.append('lastname', document.getElEementById('lastname').value);
            formData.append('email', document.getElementById('email').value);
            // formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('city_id', document.getElementById('city_id').value);

            //صورة او مجلد او فيديو، ودائما الصور والملفات تقبل القيمة الفارغة
            formData.append('image', document.getElementById('image').files[0]); // في العادة قيمة, ولكن هنا ملفات

            storeRoute('/cms/admin/viewers_update/' + id, formData)

        }
    </script>

@endsection
