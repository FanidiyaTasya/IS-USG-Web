@extends('layouts.master')

@section('content')
<form action="{{ route('sheep.store') }}" method="POST">
  @csrf
  <div class="col-12">
      <div class="card">
          <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">{{ $title }}</h4>
          </div>
          <div class="card-body p-4">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="mb-4">
                          <label for="id" class="form-label">ID Domba</label>
                          <input type="text" name="id" id="id" class="form-control" value="{{ old('id') }}">
                      </div>
                      <div class="mb-4">
                          <label for="sheep_name" class="form-label">Nama Domba</label>
                          <input type="text" name="sheep_name" id="sheep_name" value="{{ old('sheep_name') }}" class="form-control">
                      </div>
                      <div class="mb-4">
                          <label for="sheep_birth" class="form-label">Tanggal Lahir</label>
                          <input type="date" name="sheep_birth" id="sheep_birth" value="{{ old('sheep_birth') }}" class="form-control">
                      </div>
                  </div>
                  {{-- <div class="col-lg-6">
                      <div class="mb-4">
                          <label class="form-label">Jenis Domba</label>
                          <select class="form-select" name="sheep_type" aria-label="Default select example">
                              <option selected disabled>Pilih</option>
                              <option value="Induk">Induk</option>
                              <option value="Anak">Anak</option>
                          </select>
                      </div>
                  </div> --}}
                  <div class="col-lg-6">
                      <div class="mb-4">
                          <label class="form-label">Jenis Kelamin Domba</label>
                          <select class="form-select" name="sheep_gender" aria-label="Default select example">
                              <option selected disabled>Pilih Jenis Kelamin</option>
                              <option value="Jantan">Jantan</option>
                              <option value="Betina">Betina</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="d-flex align-items-center gap-3">
                          <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                          <button class="btn bg-danger-subtle text-danger">Cancel</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>
@endsection