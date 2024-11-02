@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>

                <div class="d-flex justify-content-end mb-3">
                    <div>
                        <input type="text" name="search" class="form-control search-input" data-table-id="table-sheep" placeholder="Search...">
                    </div>
                    <div>
                        <a href="{{ route('sheep.create') }}" class="btn btn-primary ms-2">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive" id="table-sheep">
                    <table class="table rounded-3 overflow-hidden">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>ID Domba</th>
                                <th>Nama Domba</th>
                                <th>Tanggal Lahir</th>
                                {{-- <th>Umur</th> --}}
                                {{-- <th>Jenis Domba</th> --}}
                                <th>Jenis Kelamin Domba</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sheep as $index => $shp)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $shp->id }}</td>
                                <td>{{ $shp->sheep_name }}</td>
                                <td>{{ Carbon\Carbon::parse($shp->sheep_birth)->format('d-m-Y') }}</td>
                                <td>{{ $shp->sheep_gender }}</td>
                                <td>
                                     <a href="{{ route('sheep.edit', $shp->id) }}" class="btn btn-info btn-sm me-2">
                                        <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                    </a>
                                    <a href="/sheep/{{ $shp->id }}" class="btn btn-warning btn-sm me-2">
                                        <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                    </a>
                                    <a href="{{ route('sheep.destroy', $shp->id) }}" class="btn btn-danger btn-sm" data-confirm-delete>
                                        <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-xs text-gray-700">
                            Showing
                            {{ $sheep->firstItem() }}
                            to
                            {{ $sheep->lastItem() }}
                            of
                            {{ $sheep->total() }}
                        </div>
                        <div>
                            {{ $sheep->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
