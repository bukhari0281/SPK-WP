@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">
    <div class="">
            <h1 class="display-5 fw-bold ">Kasus</h1>
    </div>
    <div class="">
        <a href="{{ route('create_kasus') }}" class="btn btn-outline-secondary"> + Tambah Kasus</a>

    </div>

</div>

    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="">Nama Kasus</th>
                    <th class="">Aksi</th>
                    {{-- <th class="">Kriteria</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data_kasus as $item)
                <?php $i=1; ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="">
                        <a href="{{ route('detail_kasus', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail Kasus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
