@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('kasus') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_kasus') }}" method="POST">
        @csrf
        <div class="mb-3 col-5">
          <label for="name" class="form-label">Kasus</label>
          <input type="text"
            class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ Session::get('name') }}">
        </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
