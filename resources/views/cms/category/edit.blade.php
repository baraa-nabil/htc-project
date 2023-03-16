@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit New category')

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
                            <h3 class="card-title">Edit The Category</h3>
                        </div>
                        <form>
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="name">Category Name</label>
                                    <input value="{{ $categories->name }}" type="text" class="form-control"
                                        id="name" name="name" placeholder="Enter category's Name">
                                </div>

                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="7" placeholder="Enter description for a news" id="description"
                                            name="description">{{ $categories->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select form-select-sm">
                                        <option @if ($categories->status == 'active') selected @endif value="active">active
                                        </option>
                                        <option @if ($categories->status == 'inactive') selected @endif value="inactive">
                                            inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performUpdate({{ $categories->id }})"
                                    class="btn btn-primary">Store</button>
                                <a href="{{ route('categories.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
            formData.append('name', document.getElementById('name').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('status', document.getElementById('status').value);
            storeRoute('/cms/admin/categories_update/' + id, formData)
        }
    </script>

    {{-- <script>
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
    </script> --}}

@endsection
