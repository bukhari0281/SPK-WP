@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('alternatif') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_alternatif') }}" method="POST">
        @csrf
        <div class="mb-3 col-5">
          <label for="kode" class="form-label">Kode Alternatif</label>
          <input type="text"
            class="form-control form-control-sm" name="kode" id="kode" aria-describedby="helpId" placeholder="kode" value="{{ Session::get('kode') }}">
        </div>
        <div class="mb-3 col-5">
          <label for="name" class="form-label">Nama Alternatif</label>
          <input type="text"
            class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ Session::get('name') }}">
        </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
