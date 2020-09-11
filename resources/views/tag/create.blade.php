@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('tag.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Judul Tag</label>
                                <input type="text" class="form-control" name="judul" required>
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