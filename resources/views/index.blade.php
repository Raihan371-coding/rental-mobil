<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Mahasiswa</title> 
</head> 
<body> 
    <table border="1"> 
        <tr> 
            <th>Nama Mobil</th> 
            <th>Merk</th> 
            <th>Plat Nomor</th>
            <th>Tahun</th>
            <th>Harga Sewa</th>
            <th>Status Tersedia</th>
        </tr> 
        @foreach ($data as $mhs) 
            <tr> 
                <td>{{ $mhs->nama mobil }}</td> 
                <td>{{ $mhs->merk }}</td> 
                <td>{{ $mhs->plat nomor }}</td> 
                <td>{{ $mhs->tahun }}</td> 
                <td>{{ $mhs->harga sewa }}</td> 
                <td>{{ $mhs->status tersedia }}</td> 
            </tr> 
        @endforeach 
    </table> 
</body> 
</html>