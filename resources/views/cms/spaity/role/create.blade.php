@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New Role')

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
                            <h3 class="card-title">Create New role</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Guard Name</label>
                                    <select class="form-control select2" id="guard_name" name="guard_name"
                                        style="width: 100%;">
                                        <option value="admin">Admin</option>
                                        <option value="author">Author</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter role's Name">
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                                <a href="{{ route('roles.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
            formData.append('guard_name', document.getElementById('guard_name').value);

            store('/cms/admin/roles', formData)
        }
    </script>

@endsection
