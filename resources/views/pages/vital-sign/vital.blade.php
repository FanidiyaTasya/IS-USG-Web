@extends('layouts.master')

@section('content')
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Tanda Vital</h5>
        
        <div class="d-flex justify-content-end mb-3">
          <div>
            <input type="text" name="search" class="form-control" placeholder="Search...">
          </div>

          <div>
            <button type="submit" class="btn btn-primary ms-2">Tambah</button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table">
              <thead class="bg-primary text-white">
                  <tr>
                      <th>No</th>
                      <th>ID Domba</th>
                      <th>Nama Domba</th>
                      <th>Tanggal Lahir</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Nigam</td>
                      <td>Eichmann</td>
                      <td>@Sonu</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Deshmukh</td>
                      <td>Prohaska</td>
                      <td>@Genelia</td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Roshan</td>
                      <td>Rogahn</td>
                      <td>@Hritik</td>
                  </tr>
              </tbody>
          </table>
          </div>

      </div>
    </div>
  </div>
@endsection