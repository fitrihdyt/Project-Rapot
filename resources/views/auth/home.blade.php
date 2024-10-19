@extends('master')

@section('content')
  <div style="display: flex; justify-content: center; align-items: center; height: 90vh;">
    <div style="text-align: center;">
      <h1 style="margin-bottom: 20px;">Welcome, {{ Auth::user()->name }}!</h1>
      <p style="font-size: 18px;">Selamat datang di halaman utama aplikasi kami. Terima kasih telah menggunakan layanan kami.</p>
    </div>
    @can('isAdmin')
    <div style="text-align: center; display: flex; align-items: center;">
      <img src="asset/3people.png" alt="Foto Anda" style="max-width: 100%; height: auto;">
    </div>
    @endcan
    @can('isGuru')
    <div style="text-align: center; display: flex; align-items: center;">
      <img src="asset/4people.png" alt="Foto Anda" style="max-width: 100%; height: auto;">
    </div>
    @endcan
    @can('isWalikelas')
    <div style="text-align: center; display: flex; align-items: center;">
      <img src="asset/1people.png" alt="Foto Anda" style="max-width: 100%; height: auto;">
    </div>
    @endcan
  </div>
@endsection
