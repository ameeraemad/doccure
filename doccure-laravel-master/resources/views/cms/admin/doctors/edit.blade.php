@extends('cms.admin.parent')

@section('title','إضافة طبيب')
@section('page-title','إضافة طبيب')
@section('page-breadcrumb','الأطباء')

@section('style')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('doccure/assets/plugins/select2/css/select2.min.css')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('doccure/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">

<link rel="stylesheet" href="{{asset('doccure/assets/plugins/dropzone/dropzone.min.css')}}">
@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-md-10 col-lg-10 col-xl-10">
        {{-- <div class="card-header">
            <h4 class="card-title">إضافة طبيب</h4>
        </div> --}}
        <form id="create_form">
            <!-- Basic Information -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">المعلومات الأساسية</h4>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>إسم المستخدم <span class="text-danger">*</span></label>
                                <input type="text" id="user_name" value="{{$doctor->user_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>البريد الإلكتروني <span class="text-danger">*</span></label>
                                <input type="email" id="email" value="{{$doctor->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الإسم الأول <span class="text-danger">*</span></label>
                                <input type="text" id="first_name" value="{{$doctor->first_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>إسم العائلة <span class="text-danger">*</span></label>
                                <input type="text" id="last_name" value="{{$doctor->last_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الجوال <span class="text-danger">*</span></label>
                                <input type="text" id="phone_number" value="{{$doctor->phone_number}}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الجنس <span class="text-danger">*</span></label>
                                <select class="form-control select" id="gender">
                                    <option>Select</option>
                                    <option value="M" @if($doctor->gender == 'M') selected @endif>ذكر</option>
                                    <option value="F" @if($doctor->gender == 'F') selected @endif>أنثى</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>تاريخ الميلاد <span class="text-danger">*</span></label>
                                <input type="date" value="{{$doctor->date_of_birth}}" id="birth_date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>التخصص <span class="text-danger">*</span></label>
                                <select class="form-control select" id="speciality_id">
                                    <option value="" selected disabled>إختر التخصص</option>
                                    @foreach ($specialities as $speciality)
                                    <option value="{{$speciality->id}}" @if($doctor->speciality_id == $speciality->id)
                                        selected
                                        @endif>{{$speciality->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الفعالية</label>
                                <div class="status-toggle">
                                    <input type="checkbox" id="active" class="check" @if($doctor->active) checked
                                    @endif>
                                    <label for="active" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Basic Information -->

            <!-- About Me -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">عن الطبيب</h4>
                    <div class="form-group mb-0">
                        <label>نبذة تعريفية</label>
                        <textarea class="form-control" id="bio" value="{{$doctor->bio}}" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <!-- /About Me -->

            <!-- Contact Details -->
            <div class="card contact-card">
                <div class="card-body">
                    <h4 class="card-title">تفاصيل العنوان</h4>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>العنوان الأول <span class="text-danger">*</span></label>
                                <input type="text" value="{{$doctor->address_line_1}}" class="form-control"
                                    id="address_1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">العنوان الثاني <span class="text-danger">*</span></label>
                                <input type="text" value="{{$doctor->address_line_2}}" class="form-control"
                                    id="address_2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>المدينة <span class="text-danger">*</span></label>
                                <select class="form-control select" id="city_id">
                                    <option value="" selected disabled>إختر المدينة</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}" @if($doctor->city_id == $city->id) selected
                                        @endif>{{$city->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Contact Details -->

            <!-- Pricing -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">التفاصيل المالية</h4>
                    <div class="form-group mb-0">
                        <div id="pricing_select">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="price_free" name="rating_option" class="custom-control-input"
                                    value="price_free" @if($doctor->pricing == 'Free') checked @endif>
                                <label class="custom-control-label" for="price_free">مجانا</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="price_custom" name="rating_option" value="custom_price"
                                    class="custom-control-input" @if($doctor->pricing == 'Custom') checked @endif>
                                <label class="custom-control-label" for="price_custom">سعر مخصص (بالساعة)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row custom_price_cont" id="custom_price_cont" style="display: none;">
                        <div class="col-md-4">
                            <input type="numeric" class="form-control" id="per_hour" name="custom_rating_count"
                                value="{{$doctor->per_hour ?? 0.0}}" placeholder="20">
                            <small class="form-text text-muted">ادخل السعر المناسب للساعة</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" onclick="performUpdate({{$doctor->id}})" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 JS -->
<script src="{{asset('doccure/assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Dropzone JS -->
<script src="{{asset('doccure/assets/plugins/dropzone/dropzone.min.js')}}"></script>

<!-- Bootstrap Tagsinput JS -->
<script src="{{asset('doccure/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

<!-- Profile Settings JS -->
<script src="{{asset('doccure/assets/js/profile-settings.js')}}"></script>

<script>
    function performUpdate(id){
        var data = {
            'user_name': document.getElementById('user_name').value,
            'email': document.getElementById('email').value,
            'first_name': document.getElementById('first_name').value,
            'last_name': document.getElementById('last_name').value,
            'phone_number': document.getElementById('phone_number').value,
            'active': document.getElementById('active').checked,
            'gender': document.getElementById('gender').value,
            'birth_date': document.getElementById('birth_date').value,
            'bio': document.getElementById('bio').value,
            'address_1': document.getElementById('address_1').value,
            'address_2': document.getElementById('address_2').value,
            'city_id': document.getElementById('city_id').value,
            'speciality_id': document.getElementById('speciality_id').value,
            'pricing': document.getElementById('price_free').checked ? 'Free' : 'Custom',
            'per_hour': document.getElementById('per_hour').value,
        }
        update('/cms/admin/doctors/'+id, data, '/cms/admin/doctors');
    }
</script>
@endsection