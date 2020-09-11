@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Dashboard
                    <a href="{{ route('info.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Info Game
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Berita</th>
                            <th>Versi Game</th>
                            <th>Developer Game</th>
                            <th>Publisher Game</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{ $item->artikel->berita }} </td>
                                    <td> {{ $item->versi }} </td>
                                    <td> {{$item->developer}} </td>
                                    <td> {{$item->publisher}} </td>
                                    <td>
                                    <form action="{{ route('info.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('info.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('info.edit', $item->id)}} ">
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
