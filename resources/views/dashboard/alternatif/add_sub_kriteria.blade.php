@extends('dashboard.layout')

@section('body')
    <div class="pb-3 pt-3">
        <a href="{{ route('alternatif') }}" class="btn btn-secondary"><< Kembali</a>
    </div>
    <p>{{ $alternatif->id }}</p>

    <form action="{{ route('add_sub_kriteria',  ['id' => $alternatif->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="alternatif" value="{{ $alternatif->id }}"> --}}
        <div class="form-group">
            <input type="hidden" id="alternatif_id" name="alternatif_id" >
            <label for="sub_kriteria">Pilih Sub Kriteria:</label>
            <select name="sub_kriteria_id" id="sub_kriteria" class="form-control">
                @foreach($sub_kriteria as $sub_kriteria)
                    <option value="{{ $sub_kriteria->id }}">{{ $sub_kriteria->name() }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
