@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit New Article')

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
                            <h3 class="card-title">Edit Article</h3>
                        </div>
                        <form>
                            <div class="card-body row">

                                <input type="text" name="author_id" id="author_id" value="{{ $id }}"
                                    class="form-control form-control-solid" hidden />

                                <div class="form-group col-md-12">
                                    <label>Category Name</label>
                                    <select class="form-control select2" id="category_id" name="category_id"
                                        style="width: 100%;">
                                        @foreach ($categories as $category)
                                            {{-- <option value="{{ $country->id }}">{{ $country->name }}</option> --}}
                                            <option @if ($category->id == $articles->category_id) selected @endif
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="title">Article Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter article's Name" value="{{ $articles->title }}">
                                </div>
                                <div class="form-groub col-md-6">
                                    <label for="image">Choose image</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Choose image">
                                </div>
                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="short_description">Short Discription</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description for a news" id="short_description"
                                            name="description">{{ $articles->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="full_description">Full Discription</label>
                                        <textarea class="form-control" rows="9" placeholder="Enter description for a news" id="full_description"
                                            name="full_description">{{ $articles->full_description }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performUpdate({{ $articles->id }})"
                                    class="btn btn-primary">Update</button>
                                <a href="{{ route('articles.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
            formData.append('title', document.getElementById('title').value);
            formData.append('short_description', document.getElementById('short_description').value);
            formData.append('full_description', document.getElementById('full_description').value);
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('author_id', document.getElementById('author_id').value);
            formData.append('image', document.getElementById('image').files[0]); // في العادة قيمة, ولكن هنا ملفات
            storeRoute('/cms/admin/articles_update/' + id, formData)
        }
    </script>

@endsection
