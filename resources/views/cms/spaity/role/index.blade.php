@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Role')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}
                    <a href="{{ route('roles.create') }}" type="submit" class="btn btn-info">Add New Role</a>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Guard Name</th>
                                <th>Permissions</th>
                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td><a href="{{ route('roles.permissions.index', $role->id) }}"
                                            class="btn btn-info">({{ $role->permissions_count }})
                                            permissions/s</a> </td>
                                    <td>

                                    <td>
                                        {{-- delete --}}
                                        <button type="button" onclick="performDestroy({{ $role->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        {{-- edit --}}
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a>
                                        {{-- <a href="{{ route('countries.show', $city->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $roles->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/roles/' + id, reference)
        }
    </script>

@endsection
