@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Pemeriksaan Awal</h5>

                <div class="d-flex justify-content-end mb-3">
                    <div>
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                    </div>
                    <div>
                        <a href="/assessment/create" class="btn btn-primary ms-2">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table rounded-3 overflow-hidden">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>ID Domba</th>
                                <th>Nama Domba</th>
                                <th>Nama Assesor</th>
                                <th>Tanggal Periksa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>4543456</td>
                                <td>Nana</td>
                                <td>Eichmann</td>
                                <td>22-2-2023</td>
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
                    <div class="flex justify-between px-6">
                        <div class="mt-3 text-xs text-gray-700">
                            Showing
                            {{-- {{ $assesments->firstItem() }} --}}
                            to
                            {{-- {{ $assesments->lastItem() }} --}}
                            of
                            {{-- {{ $assesments->total() }} --}}
                        </div>
                        <div class="mt-1">
                            {{-- {{ $assesments->links() }} --}}
                        </div>
                      </div>
                </div>

            </div>
        </div>
    </div>
@endsection
