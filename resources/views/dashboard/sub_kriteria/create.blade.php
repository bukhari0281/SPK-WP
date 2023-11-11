@extends('dashboard.layout')

@section('body')
    <p>
        @error('kriteria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        Id Kriteria =
        {{ $kriteria->id }}
    </p>
    <div class="pb-3 pt-3">
        <a href="{{ route('kriteria') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('tambah_sub_kriteria', $kriteria->id) }}" method="POST">
        @csrf
        {{-- <div class="mb-3 col-5">
          <label for="kode_sub_kriteria" class="form-label">Kode Kriteria</label>
          <input type="text"
            class="form-control form-control-sm" name="kode_sub_kriteria" id="kode_sub_kriteria" aria-describedby="helpId" placeholder="{{ $kriteria->kode }}" value="" readonly>
        </div> --}}
        <div class="mb-3 col-5">
          <label for="kode_sub_kriteria" class="form-label">Kode Sub Kriteria</label>
          <input type="text"
            class="form-control form-control-sm" name="kode_sub_kriteria" id="kode_sub_kriteria" aria-describedby="helpId" placeholder="kode_sub_kriteria" value="{{ Session::get('kode_sub_kriteria') }}">
        </div>
        <div class="mb-3 col-5">
          <label for="name" class="form-label">Sub Kriteria</label>
          <input type="text"
            class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ Session::get('name') }}">
        </div>
        <div class="mb-3 col-5">
          <label for="nilai" class="form-label">Nilai</label>
          <input type="number"
            class="form-control form-control-sm" name="nilai" id="nilai" aria-describedby="helpId" placeholder="nilai" value="{{ Session::get('nilai') }}">
        </div>

        <div class="mb-3 col-5">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text"
              class="form-control form-control-sm" name="keterangan" id="keterangan" aria-describedby="helpId" placeholder="keterangan" value="{{ Session::get('keterangan') }}">
            </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>

    </form>
@endsection
