@extends('cms.parent')

@section('title', 'Create')

@section('main-title', 'Create New permission')

@section('sub-title', 'Create')



@section('style')
@endsection


@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">عرض بيانات الأدوار</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="guard_name">النوع الوظيفي </label>
                                    <select class="form-control" name="guard_name" style="width: 100%;"
                                        id="guard_name" aria-label=".form-select-sm example">
                                        <option value="admin">الأدمن</option>
                                        <option value="trainer">مدرب</option>
                                        <option value="employee">موظف</option>
                                        <option value="student">موظف</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name">الاسم الوظيفي </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="أدخل الاسم الوظيفي">
                                </div>


                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                            <a href="{{route('roles.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الأدوار </button></a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


<script>

$('.guard_name').select2({
      theme: 'bootstrap4'
    })


    function performStore() {

        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('guard_name',document.getElementById('guard_name').value);

        store('/cms/admin/roles',formData);
    }

</script>

@endsection
