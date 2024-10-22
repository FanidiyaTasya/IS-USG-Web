@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Detail Data Domba</h4>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>ID Domba:</strong>
                        <p>{{ $sheep->id }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Nama Domba:</strong>
                        <p>{{ $sheep->sheep_name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Tanggal Lahir:</strong>
                        <p>{{ \Carbon\Carbon::parse($sheep->sheep_birth)->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>Jenis Kelamin Domba:</strong>
                        <p>{{ $sheep->sheep_gender }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/sheep" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
