@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <div class="form-group">
                            <label for="">Masukkan Judul Tag</label>
                            <input type="text" class="form-control" value=" {{$data->judul}} " name="judul" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value=" {{$data->slug}} "  id="" readonly>
                        </div>
                    <a href=" {{route('tag.index')}} " class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection