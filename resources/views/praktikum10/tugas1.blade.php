@extends('praktikum')
@section('JUDULPAGE','Daftar data Kategori')
@section('KONTEN')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">produk</li>
  </ol>
</nav>
        <h2>Data kategori </h2>
        <sup>Total data: {{$JRek}} record</sup>
<div class="container">
<a class="btn btn-success" href="{{route('prak10.create')}}">Tambah Data</a>
</div>
<table class="table">
  <thead>
        <thead>
            <tr>
                <th>#</th>
                <th>ID Kategori</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($KData as $i=>$p)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$p->idkat}}</td>
                <td>{{$p->kategori}}</td>
                <th>{{$p->keterangan}}</td>
                <td>
                    <a href="{{route('prak10.edit',$p->idkat)}}">Ubah</a>
                    <a href="{{route('prak14.perkategori',$p->idkat)}}">Prod</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
@endsection