<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Selamat Datang di Halaman Admin</h1>
    <p>Ini adalah halaman admin untuk mengelola data rental dan pembayaran.</p>
    <ul>
        <li><a href="{{ route('rental.index') }}">Kelola Rental</a></li>
        <li><a href="{{ route('pembayaran.index') }}">Kelola Pembayaran</a></li>
        <li><a href="{{ route('pengembalian.index') }}">Kelola Pengembalian</a></li>
    </ul>
</body>
</html>
