@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('radiology.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="assessment_id" class="form-label">ID Domba</label>
                                {{-- <input type="hidden" name="assessment_id" id="assessment_id" value="{{ $assessment_id }}"> --}}
                                {{-- <input type="text" name="sheep_name" id="sheep_name" value="{{ $ass->sheep->id }} - {{ $ass->sheep->sheep_name }}" class="form-control" readonly> --}}
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
                                <input type="text" name="check_date" id="date_time" class="form-control" readonly>
                            </div>  
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="gestational_age" class="form-label">Usia Kehamilan (in weeks)</label>
                                    <input type="number" class="form-control" id="gestational_age" name="gestational_age" min="0" step="1">
                                </div>
                                <div class="mb-4">
                                    <label for="pregnancy_status" class="form-label">Status Kehamilan</label>
                                    <select class="form-select" id="pregnancy_status" name="pregnancy_status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="Hamil">Hamil</option>
                                        <option value="Tidak Hamil">Tidak Hamil</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="ultrasound_image" class="form-label">Foto USG</label>
                                    <div class="form-control mb-3 d-flex justify-content-center">
                                        <img src="{{ asset('assets/images/sheep/placeholder.jpeg') }}" class="img-preview img-fluid rounded fixed-img-create2">
                                    </div>

                                    <input type="file" id="ultrasound_image" name="ultrasound_image" onchange="previewImage()" class="form-control @error('ultrasound_image') is-invalid @enderror">
                                    @error('ultrasound_image')
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
                                <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
      const image = document.querySelector('#ultrasound_image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection
