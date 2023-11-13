@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('sub_kriteria') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_sub_kriteria') }}" method="POST">
        @csrf
        <div class="mb-3 col-5">
          <label for="kriteria" class="form-label">Nama Kriteria</label>
          <select name="kriteria_id" class="form-control @error('kriteria_id') is-invalid @enderror">
            <option value="">Pilih Kriteria</option>
            @foreach ($kriteria as $item)
                <option value="{{ $item->id }}">{{ $item->name() }}</option>
            @endforeach
            </select>
        </div>
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

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
