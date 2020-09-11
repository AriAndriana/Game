@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            <div class="form-group">
                                <label for="">Masukkan Versi Game</label>
                                <input type="text" value=" {{$info->versi}} " name="versi" class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Developer Game</label>
                                <input type="text" value=" {{$info->developer}} " name="developer" class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Publisher Game</label>
                                <input type="text" value=" {{$info->publisher}} " name="publisher" class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Berita</label>
                                <select name="artikel_id" class="form-control" id="" readonly>
                                    @foreach ($artikel as $item)
                                        <option value=" {{$item->id}} "> {{$item->berita}} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <a href=" {{route('info.index')}} " class="btn btn-primary">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection