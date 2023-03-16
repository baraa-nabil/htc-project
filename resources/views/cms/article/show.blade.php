@extends('cms.parent')

@section('title', 'Show')

@section('main-title', 'Show The Article')

@section('sub-title', 'Show')



@section('style')
@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Show Article</h3>
                        </div>
                        <form>
                            <div class="card-body row">

                                <div class="form-group col-md-6">
                                    <label>Category Name</label>
                                    <select class="form-control select2" id="category_id" name="category_id"
                                        style="width: 100%;">
                                        @foreach ($categories as $category)
                                            {{-- <option value="{{ $country->id }}">{{ $country->name }}</option> --}}
                                            <option @if ($category->id == $articles->category_id) selected @endif
                                                value="{{ $category->id }}" disabled>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="author_id">Author Name</label>
                                    <select class="form-control select2" id="author_id" name="author_id"
                                        style="width: 100%;">
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">
                                                {{ $author->user->firstname . ' ' . $author->user->lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="title">Article Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter article's Name" value="{{ $articles->title }}" readonly>
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="image">Choose image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Choose image" readonly>
                                </div>
                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="short_description">Short Discription</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description for a news" id="short_description"
                                            name="description" disabled>{{ $articles->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="full_description">Full Discription</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description for a news" id="full_description"
                                            name="full_description" readonly>{{ $articles->full_description }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ route('articles.index') }}" type="submit" class="btn btn-info">Go Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
