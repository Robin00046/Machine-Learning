
<html>

<head>
    <title>
        Laporan
    </title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        .table tr {
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 12%;
            padding: 5px;

        }

        .tandatangan {

            text-align: center;
            margin-left: 345px;

        }
    </style>
</head>

<body>
  <h2 align=center>Data Laporan</h2>
  @if (isset($tanggal_awal) && isset($tanggal_akhir))
                  <h4  align=center>
                    Laporan {{ $tanggal_awal }} - {{ $tanggal_akhir }}
                  </h4>
                    @else
                    <h4  align=center>
                    Laporan {{ $semua }}        
                    </h4>              
                    @endif

    <table class="table" align=center border=1 cellpadding=20 cellspacing=0>
      <thead>
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col" class="text-center">Modal</th>
          <th scope="col" class="text-center">Prediksi</th>
          <th scope="col" class="text-center">Harga</th>
          <th scope="col" class="text-center">Hasil Total</th>
          <th scope="col" class="text-center">Tanggal</th>
          
        </tr>
      </thead>
        <tbody>
          @forelse ($prediksis as $item)
          <tr>
              <th scope="row" class="text-center">{{ $loop->iteration }}</th>
              <td class="text-center">{{ "Rp " . number_format($item->Penjualan,0,',','.') }}</td>
              <td class="text-center">{{ number_format($item->Prediksi,2). " Ton"  }}</td>
              <td class="text-center">{{ number_format($item->Harga) }}</td>
              <td class="text-center">{{ "Rp " . number_format($item->HasilTotal,0,',','.')}}</td>
              <td class="text-center">{{ $item->tanggal}}</td>
            </tr>
          @empty
              <tr>
                  <td colspan="6" align=center>Data Kosong</td>
              </tr>
          @endforelse
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>