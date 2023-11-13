@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('alternatif') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_nilai_alternatif') }}" method="POST">
        @csrf

        <div class="mb-3 col-5">
        <label for="alternatif" class="form-label">Alternatif</label>
            <select name="alternatif_id" class="form-control @error('alternatif_id') is-invalid @enderror">
            <option value="">Pilih Alternatif</option>
            @foreach ($alternatif as $item)
                <option value="{{ $item->id }}">{{ $item->name() }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3 col-5">
        <label for="sub_kriteria" class="form-label">Sub Kriteria</label>
            <select name="sub_kriteria_id" class="form-control @error('sub_kriteria_id') is-invalid @enderror">
            <option value="">Pilih Sub Kriteria</option>
            @foreach ($sub_kriteria as $item)
                <option value="{{ $item->id }}">{{ $item->name() }}</option>
            @endforeach
            </select>
        </div>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
