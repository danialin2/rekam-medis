@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Analisis</strong> Jadwal Dokter</h3>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-lg d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabel Jadwal Dokter</h5>
                @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Dokter' ||
                auth()->user()->role
                ==
                'Pegawai')
                <a href="/schedule/create" class="btn btn-success my-3">Tambah</a>

                <a onclick="window.print()" class="btn btn-secondary my-3">Print</a>
                @endif
                <form action="/schedule">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Cari.." autofocus name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            @if ($schedules->count())
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th class="d-none d-md-table-cell">Spesialis</th>
                        <th class="d-none d-md-table-cell">Jam</th>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{$loop->iteration + $schedules->firstItem() - 1}}</td>
                        <td>{{$schedule->doctor->name}}</td>
                        <td class="d-none d-md-table-cell">{{$schedule->doctor->specialist}}</td>
                        <td class="d-none d-md-table-cell">{{$schedule->time}}</td>
                        <td>{{$schedule->day->name}}</td>

                        <td>

                            <a href="/schedule/{{$schedule->id}}" class="btn btn-info btn-sm"><i
                                    data-feather="eye"></i></a>

                            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Dokter' ||
                            auth()->user()->role
                            ==
                            'Pegawai')
                            <a href="/schedule/{{$schedule->id}}/edit" class="btn btn-warning btn-sm"><i
                                    data-feather="edit"></i></a>
                            <form action="/schedule/{{$schedule->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin menghapus?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="d-flex justify-content-center mb-2">
                <div class="alert alert-secondary col-11" role="alert">
                    Tabel jadwal dokter masih kosong <a href="/schedule/create" class="alert-link">klik tombol <strong
                            class="text-success">Tambah</strong></a> untuk menambah jadwal dokter.
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $schedules->links() }}
    </div>
</div>
@endsection