@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Data Domba</h5>

                <div class="d-flex justify-content-end mb-3">
                    <div>
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary ms-2">Tambah</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table rounded-3 overflow-hidden">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>ID Domba</th>
                                <th>Nama Domba</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>4543456</td>
                                <td>Eichmann</td>
                                <td>22-2-2023</td>
                                <td><a href="">Edit</a>
                                    |
                                    <a href="">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
