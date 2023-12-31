@extends('nice_admin.main')
{{-- @extends('sb2_admin.main') --}}
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="h3 mb-2 text-gray-800">Tambah Data Training</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Training</li>
          <li class="breadcrumb-item active">Tambah Data Training</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Training</h6>
          </div>
          <div class="card-body">
                    <form method="POST" class="row g-3" action="{{ route('training.store') }}" >
                      @csrf
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" name="penjualan" id="penjualan" class="form-control" placeholder="Enter Penjualan" value="{{ old('penjualan') }}">
                          <label for="name">Penjualan</label>
                          @error('name') <span
                              class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" name="prediksi" id="prediksi" class="form-control" placeholder="Enter Hasil" value="{{ old('prediksi') }}" >
                          <label for="prediksi">Hasil</label>
                          @error('prediksi') 
                          <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-floating">
                          
                          <button class="btn btn-primary">Save</button>
                          <a href="{{ route('training.index') }}" class="btn btn-primary">Kembali</a>

                        </div>
                      </div>

                  </form>
                  </table>

                </div>
                        </div>
                    </div>

                
@endsection
