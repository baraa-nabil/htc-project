@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Slider')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">List Of slider name</h3> --}}
                <a href="{{ route('sliders.create') }}" type="submit" class="btn btn-info">Add New Slider</a>

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
                            <th>Image</th>
                            <th>Title</th>
                            <th>short_description</th>
                            <th>Seeting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            @if ($slider->image)
                            <td><img class="img-circle img-bordered-sm"
                                    src="{{ asset('storage/images/slider/' . $slider->image) }}" alt="" width="60"
                                    height="60">
                            </td>
                            @else
                            <td><img class="img-circle img-bordered-sm" src="{{ asset('storage/images/admin/d.png') }}"
                                    alt="" width="60" height="60">
                            </td>
                            @endif
                            {{-- <td><img src="{{ asset('storage/images/slider/' . $slider->image ?? ' ') }}" alt="">
                            </td> --}}
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->short_description }}</td>
                            <td>
                                <button type="button" onclick="performDestroy({{ $slider->id }}, this)"
                                    class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-success">
                                    <i class="fa-solid fa-location-pen"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $sliders->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/sliders/' + id, reference)
        }
</script>

@endsection