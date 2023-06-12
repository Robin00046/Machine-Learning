{{-- @extends('nice_admin.main') --}}
@extends('nice_admin.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="h3 mb-2 text-gray-800">Daftar Prediksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Daftar Prediksi</li>
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
              <h6 class="m-0 font-weight-bold text-primary">Data Prediksi</h6>
          </div>
          <div class="card-body">
                    <a href="{{ route('prediksi.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Prediksi</a>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Penjualan</th>
                        <th scope="col" class="text-center">Prediksi</th>
                        <th scope="col" class="text-center">Kuadrat</th>
                        <th scope="col" class="text-center">Hasil Kali</th>
                        <th scope="col" class="text-center">Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($prediksis as $item)
                      <tr>
                          <th scope="row" class="text-center"><a href="#">{{ $loop->iteration }}</a></th>
                          <td class="text-center">{{ "Rp " . number_format($item->Penjualan,0,',','.') }}</td>
                          <td class="text-center">{{ number_format($item->Prediksi,2). " Ton"  }}</td>
                          <td class="text-center">{{ number_format($item->Kuadrat,2) }}</td>
                          <td class="text-center">{{ "Rp " . number_format($item->HasilKali,0,',','.')}}</td>
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
                              <td colspan="5" class="text-center">Data Kosong</td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>

                </div>
                        </div>
                    </div>

                
@endsection
