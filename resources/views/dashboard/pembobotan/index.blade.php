@extends('dashboard.layout')

@section('body')
    <p class="card-title">Penilaian</p>
    <div class="pb-3"><a href="{{ route('create_pembobotan') }}" class="btn btn-primary text-white">Lakukan Pembobotan</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Kasus</th>
                    <th class="col-1">Kode</th>
                    <th class="">Kriteria</th>
                    <th class="col-3">Bobot</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($kriterias as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->bobot }}</td>
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
