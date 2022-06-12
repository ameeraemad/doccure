@extends('cms.admin.parent')

@section('title','إضافة مريض')
@section('page-title','إضافة مريض')
@section('page-breadcrumb','المرضى')

@section('style')
<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="{{asset('doccure/assets/css/bootstrap-datetimepicker.min.css')}}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('doccure/assets/plugins/select2/css/select2.min.css')}}">
@endsection

@section('page-wrapper')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">المعلومات الأساسية</h4>
            <!-- Profile Settings Form -->
            <form id="create_form">
                <div class="row form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>الإسم الأول</label>
                            <input type="text" id="first_name" class="form-control" value="{{$patient->first_name}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>إسم العائلة</label>
                            <input type="text" id="last_name" class="form-control" value="{{$patient->last_name}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>تاريخ الميلاد</label>
                            <div class="cal-icon">
                                <input type="text" id="birth_date" class="form-control datetimepicker"
                                    value="{{Carbon\Carbon::parse($patient->date_of_birth)->format('d/m/Y')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>فصيلة الدم</label>
                            <select class="form-control select" id="blood_group">
                                <option @if($patient->blood_group == 'A-') selected @endif>A-</option>
                                <option @if($patient->blood_group == 'A+') selected @endif>A+</option>
                                <option @if($patient->blood_group == 'B-') selected @endif>B-</option>
                                <option @if($patient->blood_group == 'B-') selected @endif>B+</option>
                                <option @if($patient->blood_group == 'AB-') selected @endif>AB-</option>
                                <option @if($patient->blood_group == 'AB-') selected @endif>AB+</option>
                                <option @if($patient->blood_group == 'O-') selected @endif>O-</option>
                                <option @if($patient->blood_group == 'O-') selected @endif>O+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" id="email" class="form-control" value="{{$patient->email}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="text" id="mobile" class="form-control" value="{{$patient->mobile}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>الجنس <span class="text-danger">*</span></label>
                            <select class="form-control select" id="gender">
                                <option>Select</option>
                                <option value="M" @if($patient->gender == 'M') selected @endif>ذكر</option>
                                <option value="F" @if($patient->gender == 'F') selected @endif>أنثى</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>الفعالية</label>
                            <div class="status-toggle">
                                <input type="checkbox" id="active" class="check" @if($patient->active) checked @endif>
                                <label for="active" class="checktoggle">checkbox</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Profile Settings Form -->
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">تفاصيل العنوان</h4>
            <!-- Profile Settings Form -->
            <form>
                <div class="row form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" id="address" class="form-control" value="{{$patient->address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>المدينة <span class="text-danger">*</span></label>
                            <select class="form-control select" id="city_id">
                                <option value="" selected disabled>إختر المدينة</option>
                                @foreach ($cities as $city)
                                <option value="{{$city->id}}" @if($patient->city_id == $city->id) selected
                                    @endif>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Profile Settings Form -->
        </div>
    </div>
    <div class="card-footer">
        <button type="button" onclick="performUpdate({{$patient->id}})" class="btn btn-primary">حفظ</button>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 JS -->
<script src="{{asset('doccure/assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('doccure/assets/js/moment.min.js')}}"></script>
<script src="{{asset('doccure/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
    function performUpdate(id){
        var data = {
            'first_name': document.getElementById('first_name').value,
            'last_name': document.getElementById('last_name').value,
            'birth_date': document.getElementById('birth_date').value,
            'blood_group': document.getElementById('blood_group').value,
            'email': document.getElementById('email').value,
            'mobile': document.getElementById('mobile').value,
            'gender': document.getElementById('gender').value,
            'active': document.getElementById('active').checked,
            'address': document.getElementById('address').value,
            'city_id': document.getElementById('city_id').value,
        }
        update('/cms/admin/patients/'+id,data,'/cms/admin/patients');
    }
</script>
@endsection