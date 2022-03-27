@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Master</div>

                <div class="card-body">
                    <button type="button" class="btn btn-light"><a href="#">Data Dosen</a></button>
                    <button type="button" class="btn btn-light"><a href="#">Data Mahasiswa</a></button>
                    <button type="button" class="btn btn-light"><a href="#">Data Matakuliah</a></button>
                    <button type="button" class="btn btn-light"><a href="#">Data Semester</a></button>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Transaksi</div>

                <div class="card-body">
                    <button type="button" class="btn btn-light"><a href="#">Buat Jadwal</a></button>
                    <button type="button" class="btn btn-light"><a href="#">KRS Mahasiswa</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
