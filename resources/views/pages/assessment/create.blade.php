@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Pemeriksaan Awal</h5>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="id" class="form-label">Domba</label>
                                <select id="id" name="id" class="form-control js-example-basic-single">
                                    <option selected disabled></option>
                                    @foreach($sheep as $shp)
                                        <option value="{{ $shp->id }}">{{ $shp->sheep_name }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="col-lg-4 mb-4">
                                <label for="assessor" class="form-label">Nama Assessor</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" name="assessor" id="assessor" value="{{ Auth::user()->name }}" class="form-control" disabled>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="check_date" class="form-label">Tanggal Pemeriksaan</label>
                                <input type="date" name="check_date" id="check_date" class="form-control" value="{{ date('Y-m-d') }}" disabled>
                            </div>                            
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="symptom_1" class="form-label">Gejala 1</label>
                                    <input type="text" name="symptom_1" id="symptom_1" value="{{ old('symptom_1') }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="symptom_2" class="form-label">Gejala 2</label>
                                    <input type="text" name="symptom_2" id="symptom_2" value="{{ old('symptom_2') }}" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="symptom_3" class="form-label">Gejala 3</label>
                                    <input type="text" name="symptom_3" id="symptom_3" value="{{ old('symptom_3') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="desc" class="form-label">Keterangan Lain</label>
                                    <textarea name="desc" id="desc" rows="5" class="form-control"></textarea>
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
    $(document).ready(function() {
    $('#id').select2({
        placeholder: "Pilih Domba",
        ajax: {
            url: '/get-sheep',
            processResults: function(data) {
                console.log("Data dari server:", data);
                return {
                    results: $.map(data, function(sheep) {
                        return {
                            id: sheep.id,
                            text: sheep.sheep_name
                        };
                    })
                };
            },
        }
    });
});

</script>
@endsection
