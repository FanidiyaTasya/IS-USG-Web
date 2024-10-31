@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Data Domba</h4>
          </div>
          <div class="card-body p-4 border-bottom">
            <h5 class="fs-4 fw-semibold mb-4">Account Details</h5>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                  <label for="exampleInputtext3" class="form-label">Username</label>
                  <input type="text" class="form-control" id="exampleInputtext3" placeholder="John Deo">
                </div>
                <div>
                  <label class="form-label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="John Deo">
                    <span class="input-group-text px-6" id="basic-addon1">
                      <i class="ti ti-eye fs-6"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <label class="form-label">Email</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="John Deo">
                    <span class="input-group-text px-6" id="basic-addon1">@example.com</span>
                  </div>
                </div>
                <div>
                  <label class="form-label">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="John Deo">
                    <span class="input-group-text px-6" id="basic-addon1">
                      <i class="ti ti-eye fs-6"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <h5 class="fs-4 fw-semibold mb-4">Personal Info</h5>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                  <label for="exampleInputfirstname4" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="exampleInputfirstname4" placeholder="John">
                </div>
                <div class="mb-4">
                  <label class="form-label">Country</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">India</option>
                    <option value="1">United Kingdom</option>
                    <option value="2">Srilanka</option>
                  </select>
                </div>
                <div class="mb-4">
                  <label for="exampleInputBirthDate" class="form-label">Birth Date</label>
                  <input id="exampleInputBirthDate" class="form-control" type="date" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <label for="exampleInputlastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="exampleInputlastname" placeholder="Deo">
                </div>
                <div class="mb-4">
                  <label class="form-label">Language</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">English</option>
                    <option value="1">French</option>
                  </select>
                </div>
                <div class="mb-4">
                  <label for="exampleInputphoneno" class="form-label">Phone no</label>
                  <input type="text" class="form-control" id="exampleInputphoneno" placeholder="123 4567 201">
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex align-items-center gap-3">
                  <button class="btn btn-primary">Submit</button>
                  <button class="btn bg-danger-subtle text-danger">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection