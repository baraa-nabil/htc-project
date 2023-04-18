@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit New Slider')

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
                        <h3 class="card-title">Edit The slider</h3>
                    </div>
                    <form>
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="title">slider Name</label>
                                <input value="{{ $sliders->title }}" type="text" class="form-control" id="title"
                                    name="title" placeholder="Enter slider's title">
                            </div>

                            <div class="col-md-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="short_description">Description</label>
                                    <textarea class="form-control" rows="7"
                                        placeholder="Enter short_description for a news" id="short_description"
                                        name="short_description">{{ $sliders->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-groub col-md-12">
                                <label for="image">Choose image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="Choose image">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                            <button type="button" onclick="performUpdate({{ $sliders->id }})"
                                class="btn btn-primary">Store</button>
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
    function performUpdate(id) {
            let formData = new FormData();
            formData.append('title', document.getElementById('title').value);
            formData.append('short_description', document.getElementById('short_description').value);
            formData.append('image', document.getElementById('image').files[0]); // في العادة قيمة, ولكن هنا ملفات
            storeRoute('/cms/admin/sliders_update/' + id, formData)
        }
</script>

{{-- <script>
    function performUpdate(id) {
            let formData = new FormData();
            // الترتيب مش مهم
            formData.append('firstname', document.getElementById('firstname').value);
            formData.append('lastname', document.getElementById('lastname').value);
            formData.append('email', document.getElementById('email').value);
            // formData.append('password', document.getElementById('password').value);
            formData.append('date', document.getElementById('date').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('city_id', document.getElementById('city_id').value);

            //صورة او مجلد او فيديو، ودائما الصور والملفات تقبل القيمة الفارغة
            formData.append('image', document.getElementById('image').files[0]);

            storeRoute('/cms/admin/authors_update/' + id, formData)
        }
</script> --}}

@endsection