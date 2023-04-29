@extends('cms.parent')

@section('title', 'Index')

@section('main-title', 'Index Contact')

@section('sub-title', 'Index')



@section('style')
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">List Of contact name</h3> --}}
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
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>message</th>
                            <th>Seeting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->fullName }}</td>
                            <td>{{ $contact->mobile }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <button type="button" onclick="performDestroy({{ $contact->id }}, this)"
                                    class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function performDestroy(id, reference) {
            confirmDestroy('/cms/admin/contacts/' + id, reference)
        }
</script>

@endsection