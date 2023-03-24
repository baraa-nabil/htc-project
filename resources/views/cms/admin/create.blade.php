@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New Admin')

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
                            <h3 class="card-title">Create New Admin</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-groub col-md-12">
                                        <label for="firstname">Admin First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                            placeholder="Enter Admin First Name">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Role Name</label>
                                        <select class="form-control select2" id="role_id" name="role_id"
                                            style="width: 100%;">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-groub col-md-12">
                                        <label for="lastname">Admin Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                            placeholder="Enter Admin Last Name">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-groub col-md-12">
                                        <label for="email">Email Admin</label>
                                        <input type="eamil" class="form-control" id="email" name="email"
                                            placeholder="Enter Admin Email">
                                    </div>
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="password">Admin Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Admin password">
                                    </div>
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="mobile">Mobile Admin</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter Admin mobile">
                                    </div>
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="date">Date of Birth</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            placeholder="Enter Date of Birth">
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
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-select form-select-sm">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-select form-select-sm">
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>
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

                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                                <a href="{{ route('admins.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
        function performStore() {
            let formData = new FormData();
            // الترتيب مش مهم
            formData.append('firstname', document.getElementById('firstname').value);
            formData.append('lastname', document.getElementById('lastname').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('role_id', document.getElementById('role_id').value);

            //صورة او مجلد او فيديو، ودائما الصور والملفات تقبل القيمة الفارغة
            formData.append('image', document.getElementById('image').files[0]); // في العادة قيمة, ولكن هنا ملفات

            store('/cms/admin/admins', formData)
        }
    </script>

@endsection
