@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('info.update', $info->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="">Masukkan Versi Game</label>
                                <input type="text" value=" {{$info->versi}} " name="versi" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Developer Game</label>
                                <input type="text" value=" {{$info->developer}} " name="developer" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Publisher Game</label>
                                <input type="text" value=" {{$info->publisher}} " name="publisher" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Berita</label>
                                <select name="artikel_id" class="form-control" id="">
                                    @foreach ($artikel as $item)
                                        <option value=" {{$item->id}} "> {{$item->berita}} </option>
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