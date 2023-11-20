@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">
    <div class="">
            <h1 class="display-5 fw-bold ">Alternatif</h1>
    </div>
    <div class="">
        <a href="{{ route('create_alternatif') }}" class="btn btn-outline-secondary"> + Tambah Alternatif</a>

    </div>

</div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Kode</th>
                    <th class="">Alternatif</th>
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
                        <a href="{{ route('edit_alternatif', $alt->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="{{ route('create_alternatif', $alt->id) }}" class="btn btn-sm btn-outline-primary">+</a>
                        <a href="" class="btn btn-sm btn-outline-danger">Del</a>
                        <a href="{{ route('detail_alternatif', $alt->id) }}" class="btn btn-sm btn-outline-primary">Detail alternatif</a>

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
