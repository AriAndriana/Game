@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Dashboard
                    <a href="{{ route('genre.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Genre
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Genre</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td> {{$no++}} </td>
                                    <td> {{ $item->nama }} </td>
                                    <td>
                                    <form action="{{ route('genre.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('genre.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('genre.edit', $item->id)}} ">
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
