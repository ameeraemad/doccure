@extends('cms.admin.parent')

@section('title','المدراء')

@section('style')

@endsection

@section('page-title','المدراء')
@section('page-breadcrumb','المدراء')

@section('action')
<div class="col-sm-5 col">
    <a href="{{route('admins.create')}}" class="btn btn-primary float-right mt-2">إضافة</a>
</div>
@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم</th>
                                    <th>العمر</th>
                                    <th>العنوان</th>
                                    <th>رقم الجوال</th>
                                    <th>حالة الحساب</th>
                                    <th>الجنس</th>
                                    <th>الإعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>#AD{{$admin->id}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            {{-- <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{asset('doccure/admin/assets/img/admins/admin1.jpg')}}"
                                            alt="User Image"></a> --}}
                                            <a href="profile.html">{{$admin->first_name.' '.$admin->last_name}} </a>
                                        </h2>
                                    </td>
                                    <td>{{Carbon\Carbon::parse($admin->date_of_birth)->age}}</td>
                                    <td>{{$admin->address}}</td>
                                    <td>{{$admin->mobile}}</td>
                                    <td>{{$admin->active_ar}}</td>
                                    <td>{{$admin->gender_ar}}</td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{route('admins.edit',[$admin->id])}}">
                                                <i class="fe fe-pencil"></i> تعديل
                                            </a>
                                            <a class="btn btn-sm bg-danger-light"
                                                onclick="performDelete({{$admin->id}},this)">
                                                <i class="fe fe-trash"></i> حذف
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatables JS -->
<script src="{{asset('doccure/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('doccure/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script>
    function performDelete(id, td){
        confirmDestroy('/cms/admin/admins/'+id, td);
    }
</script>
@endsection