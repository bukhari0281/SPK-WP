@extends('dashboard.layout')

@section('body')
    <p class="card-title">Kriteria</p>
    <div class="pb-3"><a href="{{ route('create_alternatif') }}" class="btn btn-primary text-white"> + Tambah Kriteria dan Bobot</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Kode Alternatif</th>
                    <th class="">Nama Alternatif</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @forelse ($data_alternatif as $alt)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $alt->kode }}</td>
                    <td>{{ $alt->name }}</td>
                    <td class="">
                        <a href="{{ route('edit_alternatif', $alt->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                    </td>
                </tr>
                <?php $i++; ?>
                @empty
                <tr>
                    <td>
                        Data alternatif masih kosong
                    </td>
                    <td>
                        Data alternatif masih kosong
                    </td>
                    <td>
                        Data alternatif masih kosong
                    </td>
                    <td>
                        Data alternatif masih kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
