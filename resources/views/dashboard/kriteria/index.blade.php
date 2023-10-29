@extends('dashboard.layout')

@section('body')
    <p class="card-title">Kriteria</p>
    <div class="pb-3"><a href="{{ route('create_kriteria') }}" class="btn btn-primary text-white"> + Tambah Kriteria dan Bobot</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Kriteria</th>
                    <th class="col-3">Bobot</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->Kriteria }}</td>
                    <td>{{ $item->Bobot }}</td>
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
