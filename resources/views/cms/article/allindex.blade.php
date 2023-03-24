@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Article')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">List Of article name</h3> --}}
                    {{-- <a href="{{ route('createArticle', $id) }}" type="submit" class="btn btn-info">Add New article</a> --}}

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
                                <th>Article title</th>
                                <th>Image</th>
                                {{-- <th>Short Description</th> --}}
                                <th>Category</th>
                                {{-- <th>Author</th> --}}
                                <th>Seeting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>

                                    @if ($article->image)
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/article/' . $article->image) }}"
                                                alt="" width="60" height="60">
                                        </td>
                                    @else
                                        <td><img class="img-circle img-bordered-sm"
                                                src="{{ asset('storage/images/article/default.jpeg') }}" alt=""
                                                width="60" height="60">
                                        </td>
                                    @endif
                                    {{-- <td>{{ $article->short_description }}</td> --}}
                                    <td>{{ $article->category->name }}</td>
                                    {{-- <td>{{ $article->author->user->firstname . ' ' . $article->author->user->lastname }} --}}
                                    </td>


                                    <td>
                                        <button type="button" onclick="performDestroy({{ $article->id }}, this)"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        {{-- <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">
                                            <i class="fa-solid fa-location-pen"></i>
                                        </a> --}}
                                        <a href="{{ route('articles.show', $article->id) }}" type="button"
                                            class="btn btn-warning" style="color: white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/articles/' + id, reference)
        }
    </script>

@endsection
