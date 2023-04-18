@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New Slider')

@section('sub-title', 'Create')



@section('style')
@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Slider</h3>
                        </div>
                        <form>
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label for="title">Slider Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter slider's Name">
                                </div>
                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="short_description">Description</label>
                                        <textarea class="form-control" rows="7" placeholder="Enter description for a news" id="short_description"
                                            name="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Slider Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                                <a href="{{ route('sliders.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
        function performStore() {
            let formData = new FormData();
            formData.append('title', document.getElementById('title').value);
            formData.append('short_description', document.getElementById('short_description').value);
            formData.append('image', document.getElementById('image').files[0]); // في العادة قيمة, ولكن هنا ملفات

            store('/cms/admin/sliders', formData)
        }
    </script>

@endsection
