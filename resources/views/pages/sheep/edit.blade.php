@extends('layouts.master')

@section('content')
<form action="/sheep/{{ $sheep->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h4 class="card-title mb-0">Ubah Data Domba</h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="id" class="form-label">ID Domba</label>
                            <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $sheep->id) }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="sheep_name" class="form-label">Nama Domba</label>
                            <input type="text" name="sheep_name" id="sheep_name" value="{{ old('sheep_name', $sheep->sheep_name) }}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="sheep_birth" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="sheep_birth" id="sheep_birth" value="{{ old('sheep_birth', $sheep->sheep_birth) }}" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label">Jenis Domba</label>
                            <select class="form-select" name="sheep_type" aria-label="Default select example">
                                <option disabled>Pilih</option>
                                <option value="Induk" {{ (old('sheep_type', $sheep->sheep_type) == 'Induk') ? 'selected' : '' }}>Induk</option>
                                <option value="Anak" {{ (old('sheep_type', $sheep->sheep_type) == 'Anak') ? 'selected' : '' }}>Anak</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label class="form-label">Jenis Kelamin Domba</label>
                            <select class="form-select" name="sheep_gender" aria-label="Default select example">
                                <option disabled>Pilih</option>
                                <option value="Jantan" {{ (old('sheep_gender', $sheep->sheep_gender) == 'Jantan') ? 'selected' : '' }}>Jantan</option>
                                <option value="Betina" {{ (old('sheep_gender', $sheep->sheep_gender) == 'Betina') ? 'selected' : '' }}>Betina</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                            <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                            <a href="/sheep" class="btn bg-danger-subtle text-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection