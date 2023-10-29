@extends('dashboard.layout')

@section('body')
    <p class="card-title">Kasus</p>
    <div class="pb-3"><a href="{{ route('create_kasus') }}" class="btn btn-primary text-white"> + Tambah Kasus</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Nama Kasus</th>
                    <th class="">Kriteria</th>
                    <th class="">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($data_kasus as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>@foreach($item->kriteria()->get() as $kriteria)
                        <div class="card shadow-sm mb-2">
                            <div class="card-body">
                                <i class="fa fa-comments"></i> {{ $kriteria->kriteria }}
                            </div>
                        </div>
                    @endforeach</td>
                    <td class="">
                        <a href="{{ route('kriteria') }}" class="btn btn-sm btn-warning text-white">Tuntaskan</a>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
