@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit New Author')

@section('sub-title', 'Edit')



@section('style')
@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit author</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-groub col-md-12">
                                        <label for="firstname">First Name</label>
                                        <input value="{{ $authors->user->firstname }}" type="text" class="form-control"
                                            id="firstname" name="firstname" placeholder="Enter author First Name">
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-groub col-md-12">
                                        <label for="lastname">Last Name</label>
                                        <input value="{{ $authors->user->lastname }}" type="text" class="form-control"
                                            id="lastname" name="lastname" placeholder="Enter author Last Name">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-groub col-md-12">
                                        <label for="email">Email author</label>
                                        <input value="{{ $authors->email }}" type="eamil" class="form-control"
                                            id="email" name="email" placeholder="Enter author Email">
                                    </div>
                                    <br>

                                    {{-- يتم تعديله من صفحة خاصة --}}
                                    {{-- <div class="form-groub col-md-12">
                                        <label for="password">author Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter author password">
                                    </div> --}}
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="mobile">Mobile author</label>
                                        <input value="{{ $authors->user->mobile }}" type="text" class="form-control"
                                            id="mobile" name="mobile" placeholder="Enter author mobile">
                                    </div>
                                    <br>

                                    <div class="form-groub col-md-12">
                                        <label for="date">Date of Birth</label>
                                        <input value="{{ $authors->user->date }}" type="date" class="form-control"
                                            id="date" name="passdateword" placeholder="Enter Date of Birth">
                                    </div>
                                    <br>

                                    <div class="form-group col-md-12">
                                        <label for="city_id">City Name</label>
                                        <select class="form-control select2" id="city_id" name="city_id"
                                            style="width: 100%;">


                                            <option selected>{{ $authors->user->city->name }}</option>

                                            @foreach ($cities as $city)
                                                {{-- <option  value="{{ $city->id }}">{{ $city->name }}</option>
                                                 --}}
                                                <option @if ($city->id == $authors->user->city_id) selected @endif
                                                    value="{{ $city->id }}">
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-md-12">
                                        <label>City Name</label>
                                        <select class="form-control select2" id="city_id" name="city_id"
                                            style="width: 100%;">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}



                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-select form-select-sm">
                                            <option selected>{{ $authors->user->gender }}</option>
                                            <option value="male">Male
                                            </option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-select form-select-sm">
                                            {{-- <option selected>{{ $authors->user->status }}</option> --}}
                                            <option @if ($authors->user->status == 'active') selected @endif value="active">active
                                            </option>
                                            <option @if ($authors->user->status == 'inactive') selected @endif value="inactive">
                                                inactive</option>
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

                                <button type="button" onclick="performUpdate({{ $authors->id }})"
                                    class="btn btn-primary">Store</button>
                                <a href="{{ route('authors.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
            formData.append('lastname', document.getElementById('lastname').value);
            formData.append('email', document.getElementById('email').value);
            // formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('city_id', document.getElementById('city_id').value);

            //صورة او مجلد او فيديو، ودائما الصور والملفات تقبل القيمة الفارغة
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/cms/admin/authors_update/' + id, formData)
        }
    </script>

@endsection
