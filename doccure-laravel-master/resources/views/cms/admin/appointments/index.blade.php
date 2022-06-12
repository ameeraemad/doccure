@extends('cms.admin.parent')

@section('title','المواعيد')

@section('style')

@endsection

@section('page-title','المواعيد')
@section('page-breadcrumb','المواعيد')

@section('action')
<div class="col-sm-5 col">
    <a href="#" data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة</a>
</div>
@endsection

@section('page-wrapper')
<div class="row">
    <div class="col-md-12">
        <!-- Recent Orders -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Patient Name</th>
                                <th>Apointment Time</th>
                                <th>Status</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"
                                                src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-01.jpg')}}"
                                                alt="User Image"></a>
                                        <a href="#">Dr. Ruby Perrin</a>
                                    </h2>
                                </td>
                                <td>Dental</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                class="avatar-img rounded-circle"
                                                src="{{asset('doccure/admin/assets/img/patients/patient1.jpg')}}"
                                                alt="User Image"></a>
                                        <a href="profile.html">Charlene Reed </a>
                                    </h2>
                                </td>
                                <td>9 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.15 AM</span></td>
                                <td>
                                    <div class="status-toggle">
                                        <input type="checkbox" id="status_1" class="check" checked>
                                        <label for="status_1" class="checktoggle">checkbox</label>
                                    </div>
                                </td>
                                <td class="text-right">
                                    $200.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent Orders -->
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatables JS -->
<script src="{{asset('doccure/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('doccure/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
@endsection