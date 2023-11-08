@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('kasus') }}" class="btn btn-outline-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_kasus') }}" method="POST">
        @csrf
        <div class="mb-3 col-5">
          <label for="kode" class="form-label">Kode</label>
          <input type="text"class="form-control form-control-sm" name="kode" id="kode" aria-describedby="helpId" placeholder="kode" value="{{ Session::get('kode') }}">
          <label for="name" class="form-label">Kasus</label>
          <input type="text"class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ Session::get('name') }}">
        </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
