@extends('cms.admin.parent')

@section('title','تعديل مدينة')
@section('page-title','تعديل مدينة')
@section('page-breadcrumb','المدن')

@section('style')
<link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">
@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تعديل مدينة</h4>
            </div>
            <form id="create_form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">الإسم</label>
                                <input type="text" id="name" value="{{$city->name}}" class=" form-control">
                            </div>
                            <div class="form-group">
                                <label>الفعالية</label>
                                <div class="status-toggle">
                                    <input type="checkbox" id="active" class="check" @if($city->checked) checked @endif>
                                    <label for="active" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$city->id}})" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>
<script>
    function performUpdate(id){
        var data = {
            'name': document.getElementById('name').value,
            'active': document.getElementById('active').checked,
        }
        update('/cms/admin/cities/'+id, data, '/cms/admin/cities');
    }
</script>
@endsection