@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{route('artikel.update', $artikel->id)}} " method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        {{-- @method('PUT') --}}
                            <div class="form-group">
                                <label for="">Masukkan Judul Artikel</label>
                                <input type="text" class="form-control" value=" {{$artikel->judul}} " name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Isi Berita</label>
                                <textarea name="berita" class="form-control"  id="" cols="30" rows="10" required> {{$artikel->berita}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kategori</label>
                                <select class="form-control"  name="kategori_id" id="">
                                    @foreach ($kategori as $item)
                                        <option value=" {{$item->id}} "> {{$item->judul}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Tag</label>
                                @php
                                    $tag = \App\Tag::all();
                                @endphp
                                <select name="tag[]" id="select2" class="form-control pilih-tag" multiple>
                                    @foreach ($tag as $item)
                                    <option value=" {{$item->id}} " {{ (in_array($item->id, $selected)) ? 'selected="selected"' : '' }}>
                                        {{$item->judul}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Genre</label>
                                <select class="form-control"  name="genre_id" id="">
                                    @foreach ($genre as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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