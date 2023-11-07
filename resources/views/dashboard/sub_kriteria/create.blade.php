@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('sub_kriteria') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_sub_kriteria') }}" method="POST">
        @csrf

        <div class="mb-3 col-5">
          <label for="alternatif_id" class="form-label">Alternatif</label>
          <select name="alternatif_id" class="form-control @error('alternatif_id') is-invalid @enderror">
            <option value="">Pilih Kode Alternatif</option>
            @foreach ($create_sub_kriteria as $item)
                <option value="{{ $item->id }}">{{ $item->kode() }}</option>
            @endforeach
        </select>
        </div>
        <div class="mb-3 col-5">
          <label for="kode_sub_riteria" class="form-label">Kode Sub Kriteria</label>
          <input type="text"
            class="form-control form-control-sm" name="kode_sub_riteria" id="kode_sub_riteria" aria-describedby="helpId" placeholder="kode_sub_riteria" value="{{ Session::get('kode_sub_riteria') }}">
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
