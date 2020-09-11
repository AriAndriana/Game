@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            <div class="form-group">
                                <label for="">Masukkan Judul Artikel</label>
                                <input type="text" class="form-control" value=" {{$artikel->judul}} " name="judul" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Isi Berita</label>
                                <textarea name="berita" class="form-control"  id="" cols="30" rows="10" readonly> {{$artikel->berita}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kategori</label>
                                <input type="text" class="form-control" name="kategori_id" value=" {{$artikel->kategori->judul}} " id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Tag</label>
                                @php
                                    $data = \App\Tag::all();
                                @endphp
                                <select name="tag[]" class="form-control pilih-tag" multiple disabled>
                                    @foreach ($data as $item)
                                    <option value=" {{$item->id}} " {{ (in_array($item->id, $selected)) ? 'selected="selected"' : '' }}>
                                        {{$item->judul}}
                                    </option>
                                    @endforeach
                                </select>
                                {{-- <ul>
                                    @foreach ($data as $item)
                                        <li> {{ (in_array($item->id, $selected)) ? $item->judul : '' }} </li>
                                    @endforeach
                                </ul> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Genre</label>
                                <input type="text" name="genre" value=" {{$artikel->genre->nama}} " class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <input type="text" class="form-control" name="user_id" id="" value=" {{$artikel->user->name}} " readonly>
                            </div>
                        <div class="form-group">
                            <a href=" {{route('artikel.index')}} " class="btn btn-primary">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.pilih-tag').select2();
        });
    </script>
@endpush