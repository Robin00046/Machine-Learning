@extends('nice_admin.main')
{{-- @extends('sb2_admin.main') --}}
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="h3 mb-2 text-gray-800">Edit Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Data User</li>
          <li class="breadcrumb-item active">Edit Data User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


      

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
          </div>
          <div class="card-body">
                    <form method="POST" class="row g-3" action="{{route('user.update',$user->id) }}" >
                      @csrf
                      @method('PUT')

                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $user->name }}">
                          <label for="name">Username</label>
                          @error('name') <span
                              class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mt-2">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}">
                          <label for="email">Email</label>
                          @error('email') <span
                              class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-floating mt-2">
                          <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                          <label for="password">Password</label>
                          @error('password') <span
                              class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-floating">
                          
                          <button class="btn btn-primary">Save</button>
                          <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>

                        </div>
                      </div>

                  </form>
                  </table>

                </div>
                        </div>
                    </div>

                
@endsection
