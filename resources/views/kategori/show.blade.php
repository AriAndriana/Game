@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Judul Kategori</label>
                                <input type="text" class="form-control" value=" {{$kategori->judul}} " name="judul" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value=" {{$kategori->slug}} " id="" readonly>
                            </div>
                        <div class="form-group">
                            <a href=" {{route('kategori.index')}} " class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection