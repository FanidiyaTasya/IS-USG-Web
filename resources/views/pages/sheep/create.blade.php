@extends('layouts.master')

@section('content')
<form action="{{ route('sheep.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="col-12">
      <div class="card">
          <div class="px-4 py-3 border-bottom">
              <h4 class="card-title mb-0">{{ $title }}</h4>
          </div>
          
          <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card p-3 w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <p class="card-subtitle mb-3">Foto Domba</p>                            
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('assets/images/sheep/sheep_vector.jpeg') }}" class="img-preview img-fluid rounded fixed-img-create">
                            </div>
                            <input type="file" name="sheep_photo" id="sheep_photo" onchange="previewImage()" class="form-control  @error('sheep_photo') is-invalid @enderror">
                            @error('sheep_photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="id" class="form-label">ID Domba</label>
                                        <input type="text" name="id" id="id" class="form-control" value="{{ $id }}" readonly>
                                    </div>
                                    <div class="mb-4">
                                        <label for="sheep_name" class="form-label">Nama Domba</label>
                                        <input type="text" name="sheep_name" id="sheep_name" value="{{ old('sheep_name') }}" class="form-control @error('sheep_name') is-invalid @enderror">
                                        @error('sheep_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="sheep_birth" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="sheep_birth" id="sheep_birth" value="{{ old('sheep_birth') }}" class="form-control @error('sheep_birth') is-invalid @enderror">
                                        @error('sheep_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Jenis Kelamin Domba</label>
                                        <select class="form-select @error('sheep_gender') is-invalid @enderror" name="sheep_gender" aria-label="Default select example">
                                            <option selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Jantan">Jantan</option>
                                            <option value="Betina">Betina</option>
                                        </select>
                                        @error('sheep_gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                                        {{-- <button class="btn bg-danger-subtle text-danger">Cancel</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<script>
    function previewImage() {
      const image = document.querySelector('#sheep_photo');
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