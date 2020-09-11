@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('profil.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Tempat & Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Alamat</label>
                                <textarea name="alamat" class="form-control" id="" cols="10" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Email</label>
                                <select name="user_id" class="form-control" id="">
                                    @foreach ($user as $item)
                                        <option value=" {{$item->id}} "> {{$item->email}} </option>
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