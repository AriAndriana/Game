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
                    <a href="{{ route('tag.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Tag
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Tag</th>
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
                                    <td>
                                    <form action="{{ route('tag.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('tag.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('tag.edit', $item->id)}} ">
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
