@extends('cms.doctor.parent')

@section('title','Change Password')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <!-- Change Password Form -->
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
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">حفظ التغييرات</button>
                        </div>
                    </form>
                    <!-- /Change Password Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection