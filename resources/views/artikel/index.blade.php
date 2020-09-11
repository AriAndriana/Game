@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Dashboard
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Artikel
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Artikel</th>
                            <th>Berita Game</th>
                            <th>Kategori Game</th>
                            <th>Tag Game</th>
                            <th>Genre Game</th>
                            {{-- <th>Penulis</th> --}}
                            <th> <center>Aksi</center> </th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{ $item->judul }} </td>
                                    <td> {{ Str::words($item->berita, 8)  }} </td>
                                    <td> {{$item->kategori->judul}} </td>
                                    <td>
                                    @foreach ($item->tag as $data)
                                        <ul> 
                                            <li>{{$data->judul}}</li>
                                        </ul> 
                                    @endforeach
                                    </td>
                                    <td> {{$item->genre->nama}} </td>
                                    {{-- <td> {{$item->user->name}} </td> --}}
                                    <td>
                                    <form action="{{ route('artikel.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('artikel.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('artikel.edit', $item->id)}} ">
                                            Edit
                                        </a> |
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
