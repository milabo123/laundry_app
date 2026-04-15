@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Statistik Hari Ini</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h6>Total Pelanggan Terdaftar</h6>
                    <h2>{{ $totalPelanggan }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h6>Orderan Masuk (Hari Ini)</h6>
                    <h2>{{ $totalOrderHariIni }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body">
                    <h6>Pendapatan (Hari Ini)</h6>
                    <h2>Rp. {{ number_format($pendapatanHariIni, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection