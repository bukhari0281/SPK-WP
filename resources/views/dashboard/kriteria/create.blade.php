@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('kriteria') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_kriteria') }}" method="POST">
        @csrf

        <div class="mb-3 col-5">
          <label for="kasus" class="form-label">Kasus</label>
          <select name="kasus_id" class="form-control @error('kasus_id') is-invalid @enderror">
            <option value="">Pilih Kasus</option>
            @foreach ($kasus as $item)
                <option value="{{ $item->id }}">{{ $item->name() }}</option>
            @endforeach
        </select>
        </div>
        <div class="mb-3 col-5">
          <label for="kriteria" class="form-label">Kriteria</label>
          <input type="text"
            class="form-control form-control-sm" name="kriteria" id="kriteria" aria-describedby="helpId" placeholder="kriteria" value="{{ Session::get('kriteria') }}">
        </div>
        <div class="mb-3 col-5">
          <label for="bobot" class="form-label">Bobot</label>
          <input type="number"
            class="form-control form-control-sm" name="bobot" id="bobot" aria-describedby="helpId" placeholder="bobot" value="{{ Session::get('bobot') }}">
        </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
