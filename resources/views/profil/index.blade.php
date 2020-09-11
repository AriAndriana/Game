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
                    <a href="{{ route('profil.create') }}" class="btn btn-primary" style="float: right;">
                        Tambah Profil User
                    </a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($profil as $item)
                                <tr>
                                    <td> {{ $item->nama }} </td>
                                    <td> {{ $item->ttl }} </td>
                                    <td> {{$item->alamat}} </td>
                                    <td> {{$item->user->email}} </td>
                                    <td>
                                    <form action="{{ route('profil.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{route('profil.show', $item->id)}} ">
                                            Show
                                        </a> |
                                        <a class="btn btn-warning" href=" {{route('profil.edit', $item->id)}} ">
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
