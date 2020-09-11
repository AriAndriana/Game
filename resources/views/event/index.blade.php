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
                    <a href="{{ route('event.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Event
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Berita Game</th>
                            <th>Kategori Game</th>
                            <th>Genre Game</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{ $item->judul }} </td>
                                    <td> {{ Str::words($item->berita, 8, '...') }} </td>
                                    <td> {{$item->kategori->judul}} </td>
                                    <td> {{$item->genre->nama}} </td>
                                    <td> {{$item->user->name}} </td>
                                    <td>
                                    <form action="{{ route('event.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('event.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('event.edit', $item->id)}} ">
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
