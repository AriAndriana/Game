@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('event.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Judul Event</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Isi Berita</label>
                                <textarea name="berita" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kategori</label>
                                <select class="form-control"  name="kategori_id" id="">
                                    @foreach ($kategori as $item)
                                        <option value=" {{$item->id}} "> {{$item->judul}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Genre</label>
                                <select class="form-control"  name="genre_id" id="">
                                    @foreach ($genre as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-primary"  type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection