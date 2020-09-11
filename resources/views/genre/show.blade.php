@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            <div class="form-group">
                                <label for="">Masukkan Judul Genre</label>
                                <input type="text" class="form-control" value=" {{$genre->nama}} " name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value=" {{$genre->slug}} " id="" readonly>
                            </div>
                        <div class="form-group">
                            <a href=" {{route('genre.index')}} " class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection