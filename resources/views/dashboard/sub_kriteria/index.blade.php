@extends('dashboard.layout')

@section('body')
    <p class="card-title">Kriteria</p>
    <div class="pb-3"><a href="{{ route('create_sub_kriteria') }}" class="btn btn-primary text-white"> + Tambah Kriteria dan Bobot</a></div>
    <div class="table-responsive">
        <table class="table table-stripped text-center">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Alternatif</th>
                    <th class="col-2 ">Kode Sub Kriteria</th>
                    <th class="col-1">Sub Kriteria</th>
                    <th class="col-1">Nilai</th>
                    <th class="">Keterangan</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->alternatif->kode() }}</td>
                    <td>{{ $item->kode_sub_kriteria }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nilai }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="">
                        <a href="{{ route('edit_kriteria', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
