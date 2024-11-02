@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('vital-sign.update', $vs->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="assessment_id" class="form-label">ID Domba</label>
                                <input type="hidden" name="assessment_id" id="assessment_id" value="{{ $vs->assessment_id }}">
                                <input type="text" name="sheep_name" id="sheep_name" class="form-control" value="{{ $vs->assessment->sheep->id }} - {{ $vs->assessment->sheep->sheep_name }}" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="assessor" class="form-label">Nama Assessor</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" name="assessor" id="assessor" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="check_date" class="form-label">Tanggal Pemeriksaan</label>
                                <input type="date" name="check_date" id="check_date" class="form-control" value="{{ $vs->assessment->check_date }}" readonly>
                            </div> 
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="temperature" class="form-label">Suhu</label>
                                    <input type="text" name="temperature" id="temperature" value="{{ old('temperature', $vs->temperature ) }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="heart_rate" class="form-label">Detak Jantung</label>
                                    <input type="text" name="heart_rate" id="heart_rate" value="{{ old('heart_rate', $vs->heart_rate) }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="respiratory_rate" class="form-label">Laju Pernapasan</label>
                                    <input type="text" name="respiratory_rate" id="respiratory_rate" value="{{ old('respiratory_rate', $vs->respiratory_rate) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="weight" class="form-label">Berat</label>
                                    <input type="text" name="weight" id="weight" value="{{ old('weight', $vs->weight) }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="status_condition" class="form-label">Kondisi Status</label>
                                    <select class="form-select" name="status_condition" id="status_condition" aria-label="Default select example">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Sehat" {{ old('status_condition', $vs->status_condition) == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                                        <option value="Tidak Sehat" {{ old('status_condition', $vs->status_condition) == 'Tidak Sehat' ? 'selected' : '' }}>Tidak Sehat</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="additional_info" class="form-label">Keterangan Lain</label>
                                    <textarea name="additional_info" id="additional_info" rows="5" class="form-control">{{ old('aditional_info', $vs->additional_info) }}</textarea>
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
