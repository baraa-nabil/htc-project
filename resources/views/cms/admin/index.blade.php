@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Admin')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}
                    <a href="{{ route('admins.create') }}" type="submit" class="btn btn-info">Add New Admin</a>

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
                                <th>Iamge</th>
                                <th>Full Name</th>
                                {{-- <th>Last Name</th> --}}
                                <th>Email</th>

                                <th>Gender</th>

                                <th>Status</th>

                                <th>City</th>

                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>

                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/admin/' . $admin->user ? $admin->user->image : '') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}
                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/admin/avatar-g35f3c61b5_1920.png') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}

                                    {{-- @if ($admin->user->image->hasFile('image'))
                                    <td><img class="img-circle img-bordered-sm"
                                    src="{{ asset('storage/images/admin/avatar-g35f3c61b5_1920.png') }}"
                                    alt="" width="60" height="60">
                                    </td>
                                    @endif --}}

                                    @if ($admin->user->image)
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/admin/' . $admin->user->image) }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @else
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/admin/avatar-g35f3c61b5_1920.png') }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @endif


                                    {{-- <td>{{ $admin->user->image ?? '' }}</td> --}}

                                    {{-- <td>{{ $admin->user->firstname ?? '' }}</td> --}}
                                    {{-- <td>{{ $admin->user->firstname ?? '' }}</td> --}}

                                    <td>{{ $admin->user->firstname . ' ' . $admin->user->lastname ?? '' }}</td>


                                    {{-- $admin->user->firstname . ' ' . --}}
                                    {{-- <td>{{ $admin->user->lastname ?? '' }}</td> --}}


                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->user->gender ?? '' }}</td>
                                    <td>{{ $admin->user->status ?? '' }}</td>
                                    <td>{{ $admin->user->city->name ?? '' }}</td>
                                    <td>
                                        {{-- delete --}}
                                        <button type="button" onclick="performDestroy({{ $admin->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        {{-- edit --}}
                                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a>
                                        <a href="{{ route('admins.show', $admin->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $admins->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/admins/' + id, reference)
        }
    </script>

@endsection
