@extends('cms.parent')

@section('title', 'Show')

@section('main-title', 'Show New category')

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
                            <h3 class="card-title">Show The Category</h3>
                        </div>
                        <form>
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="name">Category Name</label>
                                    <input value="{{ $categories->name }}" disabled type="text" class="form-control"
                                        id="name" name="name" placeholder="Enter category's Name">
                                </div>

                                <div class="col-md-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="7" placeholder="Enter description for a news" id="description"
                                            name="description" disabled>{{ $categories->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-select form-select-sm" disabled>
                                        <option @if ($categories->status == 'active') selected @endif value="active">active
                                        </option>
                                        <option @if ($categories->status == 'inactive') selected @endif value="inactive">
                                            inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ route('categories.index') }}" type="submit" class="btn btn-info">Go Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')
@endsection
