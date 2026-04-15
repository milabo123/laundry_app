@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Data Customer</div>
                <div class="card-body">
                    <form id="laundryForm">
                        <div class="mb-3">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Nama..." required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" placeholder="08..." required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="2"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow border-primary">
                <div class="card-header bg-primary text-white">Detail Layanan Laundry</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Pilih Layanan</label>
                        <select class="form-select" id="serviceSelect" onchange="updatePrice()">
                            <option value="0" data-price="0">-- Pilih Menu --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                    {{ $service->service_name }} (Rp. {{ number_format($service->price) }}/kg)
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Berat (Kg)</label>
                        <input type="number" id="weightInput" class="form-control" placeholder="0" oninput="updatePrice()">
                    </div>
                    <div class="mt-4 p-3 bg-light text-end">
                        <h5 class="text-muted">Estimasi Harga:</h5>
                        <h2 class="text-primary fw-bold" id="totalPrice">Rp. 0</h2>
                    </div>
                    <button class="btn btn-success w-100 mt-3">Simpan Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePrice() {
        const select = document.getElementById('serviceSelect');
        const pricePerKg = select.options[select.selectedIndex].getAttribute('data-price');
        const weight = document.getElementById('weightInput').value;
        const total = pricePerKg * weight;
        
        document.getElementById('totalPrice').innerText = 'Rp. ' + total.toLocaleString('id-ID');
    }
</script>
@endsection