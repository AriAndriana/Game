@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" value=" {{$profil->nama}} " class="form-control" name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat & Tanggal Lahir</label>
                                <input type="text" value=" {{$profil->ttl}} " name="ttl" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" id="" cols="10" rows="10" readonly> {{$profil->alamat}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Email</label>
                                <select name="user_id" class="form-control" id="" readonly>
                                    {{-- @foreach ($user as $item) --}}
                                        <option value=" {{$profil->user->id}} " readonly> {{$profil->user->email}} </option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <a href=" {{route('profil.index')}} " class="btn btn-primary">Kembali</a>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection