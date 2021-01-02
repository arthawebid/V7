@extends('praktikum')
@section('JUDULPAGE','Daftar data Kategori')
@section('KONTEN')
        <h2>Edit Data kategori ID: {{$EDt->idkat}} </h2>
        <form method="POST" action="/prak10/{{$EDt->idkat}}">
        @csrf()
        @method('PUT')
            <div class="txlabel">kategori*</div>
            <div class="inputext">
                <input type="text" name="txkat" value="{{ $EDt->kategori  }}">
            </div>
            <div class="txlabel">Deskripsi</div>
            <div class="inputext">
                <input type="text" name="txdesk" value="{{ $EDt->keterangan }}">
            </div>
            <div class="tombol">
                <input type="submit" class="btn btn-primary" name="btnkirim" value=" Simpan Data ">
            </div>
            <div class="catatan">
                * harus diisi
            </div>
        </form>
        <br>
        <form method="POST" action="/prak10/{{ $EDt->idkat }}">
        @csrf()
        @method('DELETE')
        <div class="tombol">
                <input type="submit" class="btn btn-danger" name="btnkirim" value=" Hapus Data ">
            </div>
        </form>
@endsection