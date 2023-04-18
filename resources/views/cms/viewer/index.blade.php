@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Viewer')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}
                    @can('Create Viewer')
                    <a href="{{ route('viewers.create') }}" type="submit" class="btn btn-info">Add New Viewer</a>
                    @endcan
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
                            @foreach ($viewers as $viewer)
                                <tr>
                                    <td>{{ $viewer->id }}</td>

                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/viewer/' . $viewer->user ? $viewer->user->image : '') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}
                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/viewer/avatar-g35f3c61b5_1920.png') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}

                                    {{-- @if ($viewer->user->image->hasFile('image'))
                                    <td><img class="img-circle img-bordered-sm"
                                    src="{{ asset('storage/images/viewer/avatar-g35f3c61b5_1920.png') }}"
                                    alt="" width="60" height="60">
                                    </td>
                                    @endif --}}

                                    @if ($viewer->user->image)
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/viewer/' . $viewer->user->image) }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @else
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/viewer/d.png') }}" alt=""
                                                width="60" height="60">
                                        </td>
                                    @endif


                                    {{-- <td>{{ $viewer->user->image ?? '' }}</td> --}}

                                    {{-- <td>{{ $viewer->user->firstname ?? '' }}</td> --}}
                                    {{-- <td>{{ $viewer->user->firstname ?? '' }}</td> --}}

                                    <td>{{ $viewer->user->firstname . ' ' . $viewer->user->lastname ?? '' }}</td>


                                    {{-- $viewer->user->firstname . ' ' . --}}
                                    {{-- <td>{{ $viewer->user->lastname ?? '' }}</td> --}}


                                    <td>{{ $viewer->email }}</td>
                                    <td>{{ $viewer->user->gender ?? '' }}</td>
                                    <td>{{ $viewer->user->status ?? '' }}</td>
                                    <td>{{ $viewer->user->city->name ?? '' }}</td>
                                    <td>
                                        {{-- delete --}}
                                        @can('Delete viewer')
                                        <button type="button" onclick="performDestroy({{ $viewer->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endcan
                                        {{-- edit --}}
                                        @can('Edit viewer')
                                        <a href="{{ route('viewers.edit', $viewer->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a>
                                        @endcan
                                        {{-- show --}}
                                        @can('Show viewer')
                                        <a href="{{ route('viewers.show', $viewer->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $viewers->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/viewers/' + id, reference)
        }
    </script>

@endsection
