@extends('cms.admin.parent')

@section('title','التخصصات')

@section('style')

@endsection

@section('page-title','التخصصات')
@section('page-breadcrumb','التخصصات')

@section('action')
<div class="col-sm-5 col">
    <a href="{{route('specialities.create')}}" class="btn btn-primary float-right mt-2">إضافة</a></div>
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
                                    <th>الفعالية</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>تاريخ التعديل</th>
                                    <th>الإعدادات</th>
                                    {{-- <th class="text-right">Paid</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialities as $speciality)
                                <tr>
                                    <td>{{$speciality->id}}</td>
                                    <td>{{$speciality->name}}</td>
                                    <td>{{$speciality->active}}</td>
                                    <td>{{$speciality->created_at->format('Y-m-d H:i')}}</td>
                                    <td>{{$speciality->updated_at->format('Y-m-d H:i')}}</td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{route('specialities.edit',[$speciality->id])}}">
                                                <i class="fe fe-pencil"></i> تعديل
                                            </a>
                                            <a class="btn btn-sm bg-danger-light"
                                                onclick="performDelete({{$speciality->id}},this)">
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
        confirmDestroy('/cms/admin/specialities/'+id, td);
    }
</script>
@endsection