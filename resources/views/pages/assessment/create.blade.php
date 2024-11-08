@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('assessment.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="sheep_id" class="form-label">ID Domba</label>
                                <select id="sheep_id" name="sheep_id" class="form-control js-example-basic-single @error('sheep_id') is-invalid @enderror">
                                    <option selected disabled></option>
                                    @foreach($sheep as $shp)
                                        <option value="{{ $shp->id }}" {{ old('sheep_id') == $shp->id ? 'selected' : '' }}>{{ $shp->id }} - {{ $shp->sheep_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sheep_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>                            
                            <div class="col-lg-4 mb-4">
                                <label for="assessor" class="form-label">Nama Assessor</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" name="assessor" id="assessor" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="check_date" class="form-label">Tanggal Pemeriksaan</label>
                                <input type="text" name="check_date" id="date_time" class="form-control" readonly>
                            </div>                            
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="symptom_1" class="form-label">Gejala 1</label>
                                    <input type="text" name="symptom_1" id="symptom_1" value="{{ old('symptom_1') }}" class="form-control @error('symptom_1') is-invalid @enderror">
                                    @error('symptom_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="symptom_2" class="form-label">Gejala 2</label>
                                    <input type="text" name="symptom_2" id="symptom_2" value="{{ old('symptom_2') }}" class="form-control @error('symptom_2') is-invalid @enderror">
                                    @error('symptom_2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="symptom_3" class="form-label">Gejala 3</label>
                                    <input type="text" name="symptom_3" id="symptom_3" value="{{ old('symptom_3') }}" class="form-control @error('symptom_3') is-invalid @enderror">
                                    @error('symptom_3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="additional_info" class="form-label">Keterangan Lain</label>
                                    <textarea name="additional_info" id="additional_info" rows="5" class="form-control @error('additional_info') is-invalid @enderror">{{ old('additional_info') }}</textarea>
                                    @error('additional_info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-3">
                                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
