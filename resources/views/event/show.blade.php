@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            <div class="form-group">
                                <label for="">Masukkan Judul Event</label>
                                <input type="text" class="form-control" value=" {{$event->judul}} " name="judul" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Isi Berita</label>
                                <textarea name="berita" class="form-control"  id="" cols="30" rows="10" readonly> {{$event->berita}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kategori</label>
                                <input type="text" class="form-control" name="kategori_id" value=" {{$event->kategori->judul}} " id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Genre</label>
                                <input type="text" name="genre" value=" {{$event->genre->nama}} " class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <input type="text" name="user" value=" {{$event->user->name}} " class="form-control" readonly>
                            </div>
                        <div class="form-group">
                            <a href=" {{route('event.index')}} " class="btn btn-primary">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection