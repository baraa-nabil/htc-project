@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Countries')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}

                    {{-- searsh form --}}

                    <form action="" method="get" style="margin-bottom:2%;">
                        <div class="row">
                            <div class="input-icon col-md-3">
                                <input type="text" class="form-control" placeholder="Search By Name of Country"
                                    name='name' @if (request()->name) value={{ request()->name }} @endif />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>

                            <div class="input-icon col-md-3">
                                <input type="text" class="form-control" placeholder="Search By Code" name='code'
                                    @if (request()->code) value={{ request()->code }} @endif />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>

                            <div class="input-icon col-md-3">
                                <input type="date" class="form-control" placeholder="Search By Date" name='created_at'
                                    @if (request()->created_at) value={{ request()->created_at }} @endif />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>

                            <div class="col-md-3">
                                <button class="btn btn-success btn-md" type="submit"> Filter</button>
                                <a href="{{ route('countries.index') }}" class="btn btn-danger">End Filter</a>
                                {{-- @can('Create-City') --}}

                                {{-- <a href="{{route('countries.create')}}"><button type="button" class="btn btn-md btn-primary"> Add New Country </button></a> --}}
                                {{-- @endcan --}}
                            </div>

                        </div>
                    </form>

                    {{-- /searsh form --}}

                    <a href="{{ route('countries.create') }}" type="submit" class="btn btn-info">Add New Country</a>

                    {{-- <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- New row  --}}

    <div class="row">
        <div class="col-12">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Number of City</th>
                            <th>Seeting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr>
                                <td>{{ $country->id }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->code }}</td>
                                <td>{{ $country->cities_count }}</td>
                                <td>
                                    <button type="button" onclick="performDestroy({{ $country->id }}, this)"
                                        class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-success">
                                        <i class="fa-solid fa-location-pen"></i>
                                    </a>
                                    <a href="{{ route('countries.show', $country->id) }}" type="button"
                                        class="btn btn-warning" style="color: white">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $countries->links() }}
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/countries/' + id, reference)
        }
    </script>

@endsection
