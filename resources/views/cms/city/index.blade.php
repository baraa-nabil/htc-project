@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Cities')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}
                    <a href="{{ route('cities.create') }}" type="submit" class="btn btn-info">Add New City</a>

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
                                <th>Name</th>
                                <th>Street</th>
                                <th>Country Name</th>
                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->street }}</td>
                                    {{-- // نجيب قيمة باستخدام العلاقة --}}
                                    <td>{{ $city->country->name }}</td>
                                    <td>
                                        {{-- delete --}}
                                        <button type="button" onclick="performDestroy({{ $city->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        {{-- edit --}}
                                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success">
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
                {{ $cities->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/cities/' + id, reference)
        }
    </script>

@endsection
