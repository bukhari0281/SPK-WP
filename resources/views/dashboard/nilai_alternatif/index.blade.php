@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">
    <div class="">
            <h1 class="display-5 fw-bold ">Nilai Alternatif</h1>
    </div>
    {{-- <div class="">
        <a href="{{ route('create_nilai_alternatif') }}" class="btn btn-outline-secondary"> + Nilai Alternatif</a>

    </div> --}}

</div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Alternatif</th>
                    {{-- @foreach ($sub_kriteria as $item)

                    <th class="col-1">{{ $item->nilai }}</th>
                    @endforeach --}}
                    <th class="col-2 text-center">Hasil</th>
                    <th class="col-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatif as $item)
                <tr>
                    <td>1</td>

                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                        <ul class="text-center">
                            @foreach ($item->sub_kriteria as $item)
                            <li >
                                {{ $item->name }} = {{ $item->nilai }}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center">
                        {{-- <a href="{{ route('edit_nilai_alternatif', $alternatif->id) }}" class="btn btn-sm btn-warning text-white">Edit</a> --}}
                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
