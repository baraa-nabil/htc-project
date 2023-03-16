@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Author')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of Countries name</h3> --}}
                    <a href="{{ route('authors.create') }}" type="submit" class="btn btn-info">Add New author</a>

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

                                <th>Articles</th>

                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>

                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/author/' . $author->user ? $author->user->image : '') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}
                                    {{-- <td><img class="img-circle img-bordered-sm"
                                            src="{{ asset('storage/images/author/avatar-g35f3c61b5_1920.png') }}"
                                            alt="" width="60" height="60">
                                    </td> --}}

                                    {{-- @if ($author->user->image->hasFile('image'))
                                    <td><img class="img-circle img-bordered-sm"
                                    src="{{ asset('storage/images/author/avatar-g35f3c61b5_1920.png') }}"
                                    alt="" width="60" height="60">
                                    </td>
                                    @endif --}}

                                    @if ($author->user->image)
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/author/' . $author->user->image) }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @else
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/author/avatar-g35f3c61b5_1920.png') }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @endif


                                    {{-- <td>{{ $author->user->image ?? '' }}</td> --}}

                                    {{-- <td>{{ $author->user->firstname ?? '' }}</td> --}}
                                    {{-- <td>{{ $author->user->firstname ?? '' }}</td> --}}

                                    <td>{{ $author->user->firstname . ' ' . $author->user->lastname ?? '' }}</td>


                                    {{-- $author->user->firstname . ' ' . --}}
                                    {{-- <td>{{ $author->user->lastname ?? '' }}</td> --}}


                                    <td>{{ $author->email }}</td>
                                    <td>{{ $author->user->gender ?? '' }}</td>
                                    <td>{{ $author->user->status ?? '' }}</td>
                                    <td>{{ $author->user->city->name ?? '' }}</td>
                                    <td><a href="{{ route('indexArticle', ['id' => $author->id]) }}"
                                            class="btn btn-info">({{ $author->articles_count }})
                                            article/s</a> </td>
                                    <td>
                                        {{-- delete --}}
                                        <button type="button" onclick="performDestroy({{ $author->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        {{-- edit --}}
                                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a>
                                        <a href="{{ route('authors.show', $author->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $authors->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/authors/' + id, reference)
        }
    </script>

@endsection
