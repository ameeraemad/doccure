@extends('cms.admin.parent')

@section('title','الحساب الشخصي')
@section('page-title','الحساب الشخصي')
@section('page-breadcrumb','الحساب الشخصي')

@section('style')

@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        <img class="rounded-circle" alt="User Image"
                            src="{{asset('doccure/admin/assets/img/profiles/avatar-01.jpg')}}">
                    </a>
                </div>
                <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0">{{Auth::user('admin')->full_name}}</h4>
                    <h6 class="text-muted">{{Auth::user('admin')->email}}</h6>
                    <div class="user-Location"><i class="fa fa-map-marker"></i> {{Auth::user('admin')->address}}</div>
                    {{-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div> --}}
                </div>
                {{-- <div class="col-auto profile-btn">
                    <a href="" class="btn btn-primary">
                        Edit
                    </a>
                </div> --}}
            </div>
        </div>
        <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">تفاصيل الحساب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password_tab">كلمة المرور</a>
                </li>
            </ul>
        </div>
        <div class="tab-content profile-tab-cont">

            <!-- Personal Details Tab -->
            <div class="tab-pane fade show active" id="per_details_tab">

                <!-- Personal Details -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between">
                                    <span>البيانات الشخصية</span>
                                    <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                            class="fa fa-edit mr-1"></i>تعديل</a>
                                </h5>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الإسم</p>
                                    <p class="col-sm-10">{{Auth::user('admin')->full_name}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">تاريخ الميلاد</p>
                                    <p class="col-sm-10">{{Auth::user('admin')->date_of_birth}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">البريد الإلكتروني</p>
                                    <p class="col-sm-10">{{Auth::user('admin')->email}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">رقم الجوال</p>
                                    <p class="col-sm-10">{{Auth::user('admin')->mobile}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0">العنوان</p>
                                    <p class="col-sm-10 mb-0">{{Auth::user('admin')->address}}<br>
                                        {{-- Miami,<br>
                                        Florida - 33165,<br> --}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Details Modal -->
                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Personal Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row form-row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="John">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="Doe">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Date of Birth</label>
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control" value="24-07-1983">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email ID</label>
                                                        <input type="email" class="form-control"
                                                            value="johndoe@example.com">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" value="+1 202-555-0125" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="form-title"><span>Address</span></h5>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control"
                                                            value="4663 Agriculture Lane">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" value="Miami">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <input type="text" class="form-control" value="Florida">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Zip Code</label>
                                                        <input type="text" class="form-control" value="22434">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" value="United States">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Save
                                                Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Edit Details Modal -->

                    </div>


                </div>
                <!-- /Personal Details -->

            </div>
            <!-- /Personal Details Tab -->

            <!-- Change Password Tab -->
            <div id="password_tab" class="tab-pane fade">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">تغيير كلمة المرور</h5>
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <form>
                                    <div class="form-group">
                                        <label>كلمة المرور القديمة</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>كلمة المرور الجديدة</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>تأكيد كلمة المرور</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <button class="btn btn-primary" type="submit">تغيير</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Change Password Tab -->

        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection