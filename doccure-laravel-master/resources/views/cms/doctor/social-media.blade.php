@extends('cms.doctor.parent')

@section('title','Social Media')

@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card">
            <div class="card-body">

                <!-- Social Form -->
                <form>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Twitter URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Instagram URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Pinterest URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Linkedin URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="form-group">
                                <label>Youtube URL</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
                <!-- /Social Form -->

            </div>
        </div>
    </div>
@endsection
