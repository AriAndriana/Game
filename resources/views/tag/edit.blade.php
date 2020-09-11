@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('tag.update', $tag->id) }} " method="POST">
                        @csrf
                        @method ('PUT')
                            <div class="form-group">
                                <label for="">Masukkan Judul Tag</label>
                                <input type="text" class="form-control" value=" {{$tag->judul}} " name="judul" required>
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