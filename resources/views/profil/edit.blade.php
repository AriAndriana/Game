@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('profil.update', $profil->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" value=" {{$profil->nama}} " class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat & Tanggal Lahir</label>
                            <input type="text" value=" {{$profil->ttl}} " name="ttl" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="10" rows="10" required> {{$profil->alamat}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Email</label>
                            <select name="user_id" class="form-control" id="" >
                                @foreach ($user as $item)
                                    <option value=" {{$item->id}} " > {{$item->email}} </option>
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