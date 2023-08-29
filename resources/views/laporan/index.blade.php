{{-- @extends('nice_admin.main') --}}
@extends('nice_admin.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

      

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3 mb-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
          </div>
          <div class="card-body">
                    <form class="row g-3 col-md-4 " action="{{ route('laporan') }}" method="get">
                        <div class="col-md-4">
                          <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" placeholder="Tanggal Awal" value="{{ $tanggal_awal }}">
                        </div>
                        <div class="col-md-4">
                          <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir" value="{{ $tanggal_akhir }}">
                        </div>
                        <div class="col-md-4">
                            <div class="grid gap-3">
                                <button type="submit" class="p-2 g-col-6 btn btn-primary">Cari</button>
                                @if (isset($tanggal_awal) && isset($tanggal_akhir))
                                <a href="{{ route('laporan') }}"class="p-2 g-col-6 btn btn-secondary">Reset</a>
                                @endif
                            </div>
                        </div>
                       
                    </form>

                    @if (isset($tanggal_awal) && isset($tanggal_akhir))
                    <form action="{{ route('laporan.cetak') }}" method="get">
                        <input type="hidden" name="tanggal_awal" id="tanggal_awal"value="{{ $tanggal_awal }}">
                        <input type="hidden" name="tanggal_akhir" id="tanggal_akhir"  value="{{ $tanggal_akhir }}">
                      <button type="submit"  class="btn btn-primary mt-3 mb-3" formtarget="_blank"><i class="bx bx-printer"></i> Cetak</button>   </form>
                    @else
                    <form action="{{ route('laporan.cetak') }}" method="get">
                      <button type="submit"  class="btn btn-primary mt-3 mb-3" formtarget="_blank"><i class="bx bx-printer"></i> Cetak</button>   </form>                       
                    @endif

                  <table class="mt-3 table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Modal</th>
                        <th scope="col" class="text-center">Prediksi</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Hasil Total</th>
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($prediksis as $item)
                      <tr>
                          <th scope="row" class="text-center"><a href="#">{{ $loop->iteration }}</a></th>
                          <td class="text-center">{{ "Rp " . number_format($item->Penjualan,0,',','.') }}</td>
                          <td class="text-center">{{ number_format($item->Prediksi,2). " Ton"  }}</td>
                          <td class="text-center">{{ number_format($item->Harga) }}</td>
                          <td class="text-center">{{ "Rp " . number_format($item->HasilTotal,0,',','.')}}</td>
                          <td class="text-center">{{ $item->tanggal}}</td>
                          <td class="text-center">
                              <a href="{{ route('prediksi.edit',$item->id) }}"><span class="btn btn-warning "><i class="bx bx-pencil"> </i></span></a>
                              <form class="d-inline" action="{{ route('prediksi.destroy',$item->id) }}" method="POST" onclick="return confirm('Are you sure?')">
                                  @method('DELETE')
                                  @csrf
                                  <button class="btn btn-danger border-0" >
                                  <i class="bx bxs-trash"></i>
                                      
                                  </button>          
                                 </form>
                          </td>
                        </tr>
                      @empty
                          <tr>
                              <td colspan="7" class="text-center">Data Kosong</td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>

                </div>
                        </div>
                    </div>

                
@endsection
