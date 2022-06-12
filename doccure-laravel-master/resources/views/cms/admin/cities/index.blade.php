@extends('cms.admin.parent')

@section('title','المدن')

@section('style')

@endsection

@section('page-title','المدن')
@section('page-breadcrumb','المدن')

@section('action')
<div class="col-sm-5 col">
    <a href="{{route('cities.create')}}" class="btn btn-primary float-right mt-2">إضافة</a></div>
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
                                @foreach ($cities as $city)
                                <tr>
                                    <td>{{$city->id}}</td>
                                    <td>{{$city->name}}</td>
                                    <td>{{$city->active}}</td>
                                    <td>{{$city->created_at->format('Y-m-d H:i')}}</td>
                                    <td>{{$city->updated_at->format('Y-m-d H:i')}}</td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{route('cities.edit',[$city->id])}}">
                                                <i class="fe fe-pencil"></i> تعديل
                                            </a>
                                            <a class="btn btn-sm bg-danger-light"
                                                onclick="performDelete({{$city->id}},this)">
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
        confirmDestroy('/cms/admin/cities/'+id, td);
    }
</script>
@endsection