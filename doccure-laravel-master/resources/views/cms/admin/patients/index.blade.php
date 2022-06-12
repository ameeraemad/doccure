@extends('cms.admin.parent')

@section('title','المرضى')

@section('style')

@endsection

@section('page-title','المرضى')
@section('page-breadcrumb','المرضى')

@section('action')
<div class="col-sm-5 col">
    <a href="{{route('patients.create')}}" class="btn btn-primary float-right mt-2">إضافة</a>
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
                                    <th>أخر زيارة</th>
                                    <th>إجمالي المدفوع</th>
                                    <th>الإعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr>
                                    <td>#PT{{$patient->id}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{asset('doccure/admin/assets/img/patients/patient1.jpg')}}"
                                                    alt="User Image"></a>
                                            <a href="profile.html">{{$patient->first_name.' '.$patient->last_name}} </a>
                                        </h2>
                                    </td>
                                    <td>{{Carbon\Carbon::parse($patient->date_of_birth)->age}}</td>
                                    <td>{{$patient->address}}</td>
                                    <td>{{$patient->mobile}}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{route('patients.edit',[$patient->id])}}">
                                                <i class="fe fe-pencil"></i> تعديل
                                            </a>
                                            <a class="btn btn-sm bg-danger-light"
                                                onclick="performDelete({{$patient->id}},this)">
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
        confirmDestroy('/cms/admin/patients/'+id, td);
    }
</script>
@endsection