@extends('nice_admin.main')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body">
                  <h2 class="mt-4 text-center" >
                    Selamat Datang 
                    {{ Auth::user()->name  }}
                  </h2>
                  <h2 class="mt-4 text-center" >
                    Anda login sebagai
                    {{ Auth::user()->roles->first()->name  }}
                  </h2>
                </div>

              </div>
            </div><!-- End Top Selling -->

        </div><!-- End Left side columns -->


    </section>

  </main><!-- End #main -->
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
