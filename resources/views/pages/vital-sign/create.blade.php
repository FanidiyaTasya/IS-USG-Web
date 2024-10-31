@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="assessment_id" class="form-label">ID Domba</label>
                                <select id="assessment_id" name="assessment_id" class="form-control js-example-basic-single">
                                    <option selected disabled></option>
                                    @foreach($assessments as $ass)
                                        <option value="{{ $ass->id }}">{{ $ass->sheep->id }} - {{ $ass->sheep->sheep_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="assessor" class="form-label">Nama Assessor</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" name="assessor" id="assessor" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="check_date" class="form-label">Tanggal Pemeriksaan</label>
                                <input type="date" name="check_date" id="check_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                            </div> 
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="temperature" class="form-label">Suhu</label>
                                    <input type="text" name="temperature" id="temperature" value="{{ old('temperature') }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="heart_rate" class="form-label">Detak Jantung</label>
                                    <input type="text" name="heart_rate" id="heart_rate" value="{{ old('heart_rate') }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="respiratory_rate" class="form-label">Laju Pernapasan</label>
                                    <input type="text" name="respiratory_rate" id="respiratory_rate" value="{{ old('respiratory_rate') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="weight" class="form-label">Berat</label>
                                    <input type="text" name="weight" id="weight" value="{{ old('weight') }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="status_condition" class="form-label">Kondisi Status</label>
                                    <select class="form-select" name="status_condition" id="status_condition" aria-label="Default select example">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Sehat" {{ old('status_condition') == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                                        <option value="Tidak Sehat" {{ old('status_condition') == 'Tidak Sehat' ? 'selected' : '' }}>Tidak Sehat</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="additional_info" class="form-label">Keterangan Lain</label>
                                    <textarea name="additional_info" id="additional_info" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-3">
                                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                                <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection