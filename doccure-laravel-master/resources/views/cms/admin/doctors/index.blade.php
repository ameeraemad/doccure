@extends('cms.admin.parent')

@section('title','الأطباء')

@section('style')

@endsection

@section('page-title','الأطباء')
@section('page-breadcrumb','الأطباء')

@section('action')
<div class="col-sm-5 col">
    <a href="{{route('doctors.create')}}" class="btn btn-primary float-right mt-2">إضافة</a>
</div>
@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>الإسم</th>
                                <th>التخصص</th>
                                <th>تاريخ التسجيل</th>
                                <th>الإيرادات</th>
                                <th>حالة الحساب</th>
                                <th>الإعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                class="avatar-img rounded-circle"
                                                src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-01.jpg')}}"
                                                alt="User Image"></a>
                                        <a href="profile.html">{{$doctor->first_name.' '.$doctor->last_name}}</a>
                                    </h2>
                                </td>
                                <td>{{$doctor->speciality->name}}</td>
                                <td>{{$doctor->created_at->format('Y M d')}}
                                    <br><small>{{$doctor->created_at->format('h.m a')}}</small></td>
                                <td>$0</td>
                                {{-- <td>14 Jan 2019 <br><small>02.59 AM</small></td>
                                <td>$3100.00</td> --}}
                                <td>
                                    <div class="status-toggle">
                                        <input type="checkbox" id="active" class="check" @if($doctor->active) checked
                                        @endif>
                                        <label for="active" class="checktoggle">checkbox</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{route('doctors.edit',[$doctor->id])}}">
                                            <i class="fe fe-pencil"></i> تعديل
                                        </a>
                                        <a class="btn btn-sm bg-danger-light"
                                            onclick="performDelete({{$doctor->id}},this)">
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
@endsection

@section('scripts')
<script>
    function performDelete(id, td){
        confirmDestroy('/cms/admin/doctors/'+id, td);
    }
</script>
@endsection