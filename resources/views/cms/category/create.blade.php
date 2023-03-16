@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New category')

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
                            <h3 class="card-title">Create New category</h3>
                        </div>
                        <form>
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter category's Name">
                                </div>

                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="7" placeholder="Enter description for a news" id="description"
                                            name="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <br>
                                    <select name="status" id="status" class="form-select form-select-sm">
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('status', document.getElementById('status').value);
            store('/cms/admin/categories', formData)
        }
    </script>

@endsection
