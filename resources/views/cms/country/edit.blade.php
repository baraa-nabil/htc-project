@extends('cms.parent')

@section('title', 'Edit')

@section('main-title', 'Edit Data of Country')

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
                            <h3 class="card-title">Edit Data of Country</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Country Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $countries->name }}" placeholder="Enter Country's Name">
                                </div>
                                <div class="form-group">
                                    <label for="code">Country Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ $countries->code }}" placeholder="Ente Country's Code">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $countries->id }})"
                                    class="btn btn-primary">Store</button>
                                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">Go To Back</a>

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
            formData.append('name', document.getElementById('name').value);
            formData.append('code', document.getElementById('code').value);

            storeRoute('/cms/admin/countries_update/' + id, formData)
        }
    </script>

@endsection
