<!-- start Custom Design Example -->
<div class="card-body wizard-content">
  <form action="#" class="tab-wizard wizard-circle">
    <!-- Step 1 -->
    <h6>Pemeriksaan Awal</h6>
    <section>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <label for="sheep_id" class="form-label">ID Domba</label>
          <select id="sheep_id" name="sheep_id" class="form-control js-example-basic-single">
            <option selected disabled></option>
            @foreach($sheep as $shp)
              <option value="{{ $shp->id }}">{{ $shp->id }} - {{ $shp->sheep_name }}</option>
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
      </section>
      <!-- Step 2 -->
      <h6>Tanda Vital</h6>
      <section>
        <div class="row">
          <div class="col-lg-4 mb-4">
              <label for="assessment_id" class="form-label">ID Domba</label>
              <input type="text" class="form-control" id="jobTitle1" />
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
      </section>
      <!-- Step 3 -->
      <h6>Radiologi</h6>
      <section>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <label for="assessment_id" class="form-label">ID Domba</label>
            <input type="text" class="form-control" id="jobTitle1" />
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
      </section>
    </form>
  </div>
<!-- end Custom Design Example -->