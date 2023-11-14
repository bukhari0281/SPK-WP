@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">

    <div class="">
        <h1 class="display-5 fw-bold ">Sub Kriteria</h1>
    </div>
    <div class="">
    <a href="{{ route('create_sk') }}" class="btn btn-outline-secondary"> + Tambah Sub Kasus</a>
</div>

</div>
    <div class="table-responsive">
        <table class="table table-stripped text-center">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Kode</th>
                    <th class="col-2">Kriteria</th>
                    <th class="col-2">Sub Kriteria</th>
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
                    <td>{{ $item->kode_sub_kriteria }}</td>
                    <td>{{ $item->kriteria->name() }}</td>
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
