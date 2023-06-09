@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit New Role')

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
                            <h3 class="card-title">Edit role</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Guard Name</label>
                                    <select class="form-control select2" id="guard_name" name="guard_name"
                                        style="width: 100%;">
                                        <option value="admin" @if ($roles->guard_name == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="author" @if ($roles->guard_name == 'author') selected @endif>Author
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter role's Name" value="{{ $roles->name }}">
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performUpdate($roles->id)"
                                    class="btn btn-primary">Update</button>
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
        function performUpdate(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('guard_name', document.getElementById('guard_name').value);

            storeRoute('/cms/admin/roles_update/' + id, formData)
        }
    </script>

@endsection
