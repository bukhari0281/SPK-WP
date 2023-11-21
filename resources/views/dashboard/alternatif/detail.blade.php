@extends('dashboard.layout')

@section('body')
<div class="pb-3">
    <a href="{{ route('alternatif') }}" class="btn btn-outline-primary"><< Kembali</a>
</div>
<br>
<div class="row">
    <div class="col-4  text-center">
        <div class="card">
            <div class="card-header">
                <h3 class="p p-2 pb-1 text-center">Data Alternatif</h3>
            </div>
                <div class="card-body text-center">
                    <table class="table table-borderless  pb-1">
                        <thead  class="text-center">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Alternatif</th>
                        </tr>
                        </thead>
                        <tbody  class="text-center">
                            <tr>
                                <td>{{ $detail_alternatif->kode }}</td>
                                <td>{{ $detail_alternatif->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="p p-2 pb-1 text-center">Data Sub Kriteria yang Dipilih</h3>
            </div>
                <div class="card-body text-center">
                    <table class="table table-borderless  pb-1">
                        <thead  class="text-center">
                        <tr>
                            <th scope="col">Sub Kriteria</th>
                            <th scope="col">Nilai</th>
                        </tr>
                        </thead>
                        <tbody  class="text-center">
                            {{-- @if ($item->sub_kriteria) --}}
                            @foreach ($sub_kriteria as $item)
                            <tr>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->nilai }}
                                        </td>
                                    </tr>
                                {{-- @endif --}}
                                @endforeach

                        </tbody>
                    </table>
                            <hr>
                            <a href="{{ route('create_sub_kriteria', $detail_alternatif->id) }}" class="btn btn-primary text-white mt-1">+ Sub Kriteria</a>
                </div>
        </div>
    </div>
</div>


@endsection
