@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('alternatif') }}" class="btn btn-secondary"><< Kembali</a>
    </div>

    <form action="{{ route('store_sub_kriteria',  ['id' => $alternatif->id]) }}" method="POST">
        @csrf
        {{-- <input type="hidden" name="alternatif" value="{{ $alternatif->id }}"> --}}
        <div class="form-group">
            <input type="hidden" id="alternatif_id" name="alternatif_id" >
            <label for="sub_kriteria">Pilih Sub Kriteria:</label>
            <select name="sub_kriteria[]" id="sub_kriteria" class="form-control">
                @foreach($sub_kriteria as $sub_kriteria)
                    <option value="{{ $sub_kriteria->id }}">{{ $sub_kriteria->name() }}</option>
                @endforeach
            </select>
            {{-- <select name="sub_kriteria[]" class="form-control @error('sub_kriteria') is-invalid @enderror">
                <option value="">Pilih Kriteria</option>
                @foreach ($sub_kriteria as $item)
                    <option value="{{ $item->sub_kriteria }}">{{ $item->name() }}</option>
                @endforeach
                </select> --}}
        </div>
        <br>

        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
