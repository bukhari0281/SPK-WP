@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">
    <div class="">
            <h1 class="display-5 fw-bold ">Nilai Alternatif</h1>
    </div>
    <div class="">
        <a href="{{ route('create_nilai_alternatif') }}" class="btn btn-outline-secondary"> + Nilai Alternatif</a>

    </div>

</div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Alternatif</th>
                    <th class="col-1">Sub Kriteria</th>
                    <th class="col-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <tr>
                    <td>{{ $i }}</td>
                    @foreach ($alternatif as $a)
                    <td>{{ $a->alternatif->name() }}</td>
                    @endforeach
                    @foreach ($alternatif as $sk)
                    <td>{{ $sk->sub_kriteria->name() }}</td>
                    @endforeach
                    <td class="text-center">
                        {{-- <a href="{{ route('edit_nilai_alternatif', $alternatif->id) }}" class="btn btn-sm btn-warning text-white">Edit</a> --}}
                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                    </td>
                </tr>
                <?php $i++; ?>
            </tbody>
        </table>
    </div>

@endsection
