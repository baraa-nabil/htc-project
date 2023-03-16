@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New Country')

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
                            <h3 class="card-title">Create New Country</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Country Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Country's Name">
                                </div>
                                <div class="form-group">
                                    <label for="code">Country Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="Ente Country's Code">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                {{-- <button type="submit" class="btn btn-primary">Stor</button> --}}
                                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">Go Back</a>
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
            formData.append('name', document.getElementById('name').value);
            formData.append('code', document.getElementById('code').value);

            store('/cms/admin/countries', formData)
        }
    </script>

@endsection
