@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Category')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of category name</h3> --}}
                    <a href="{{ route('categories.create') }}" type="submit" class="btn btn-info">Add New Category</a>

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
                                {{-- <th>Description</th> --}}
                                <th>Sratus</th>
                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td> <span
                                            @if ($category->status == 'active') class="badge bg-success"
                                    @else
                                    class="badge bg-danger" @endif>{{ $category->status }}</span>
                                    </td>
                                    <td>
                                        <button type="button" onclick="performDestroy({{ $category->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a>
                                        <a href="{{ route('categories.show', $category->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/categories/' + id, reference)
        }
    </script>

@endsection
