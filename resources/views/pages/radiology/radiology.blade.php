@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Data Radiologi USG</h5>

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
                            <th>Tanggal Pemeriksaan</th>
                            <th>Nama Domba</th>
                            <th>Usia Kandungan</th>
                            <th>Perkiraan Lahir</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nigam</td>
                            <td>Eichmann</td>
                            <td>@Sonu</td>
                            <td>50kg</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm me-2">
                                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2">
                                    <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Deshmukh</td>
                            <td>Prohaska</td>
                            <td>@Genelia</td>
                            <td>40kg</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm me-2">
                                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2">
                                    <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Roshan</td>
                            <td>Rogahn</td>
                            <td>@Hritik</td>
                            <td>30kg</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm me-2">
                                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2">
                                    <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
