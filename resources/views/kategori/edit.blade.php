@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('kategori.update', $kategori->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="">Masukkan Judul Kategori</label>
                                <input type="text" class="form-control" value=" {{$kategori->judul}} " name="judul" required>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection