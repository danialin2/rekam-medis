@extends('layouts.index')
@section('main')
<h3 class="mb-3"><strong>Tambah</strong> Jadwal Dokter</h3>
<div class="row">
    <div class="col-md">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Data</h5>
            </div>
            <div class="card-body">
                <form action="/schedule" method="post">
                    @csrf
                    <div class="mb-3">

                        <label for="doctor_id" class="form-label">Nama Dokter</label>
                        <select class="form-select mb-3" name="doctor_id" id="doctor_id">
                            @foreach ($doctors as $dokter)
                            @if (old('doctor_id') == $dokter->id)
                            <option value="{{$dokter->id}}" selected>{{$dokter->name}}</option>
                            @else
                            <option value="{{$dokter->id}}">{{$dokter->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Jam</label>
                        <input type="text" class="form-control @error('time') is-invalid @enderror" id="time"
                            name="time" value="{{old('time')}}">
                        @error('time')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="day_id" class="form-label">Hari</label>
                        <select class="form-select mb-3" name="day_id" id="day_id">
                            @foreach ($days as $day)
                            @if (old('day_id') == $day->id)
                            <option value="{{$day->id}}" selected>{{$day->name}}</option>
                            @else
                            <option value="{{$day->id}}">{{$day->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <a class="btn btn-secondary me-1" href="/schedule">Kembali</i></a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
$(document).ready(function() {
    // Ketika opsi select dokter diubah
    $('#doctor_id').change(function() {
        // Dapatkan nama dokter dari data atribut HTML
        var selectedDoctorName = $(this).find(':selected').data('name');

        // Tampilkan nama dokter di input text
        $('#doctor_name').val(selectedDoctorName);
    });
});
</script>