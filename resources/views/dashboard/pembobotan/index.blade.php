@extends('dashboard.layout')

@section('body')
    <p class="card-title">Kriteria</p>
    <div class="pb-3"><a href="{{ route('create_kriteria') }}" class="btn btn-primary text-white"> + Tambah Kriteria dan Bobot</a></div>

    <div class="table-responsive">
        {{-- @foreach ($kriterias as $item) --}}
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Kasus</th>
                    @foreach ($kriterias as $krit)


                    <th class="col-1">{{ $krit->kode }}</th>
                    @endforeach
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            @foreach ($kriterias as $ks)
            <tbody>
                <?php $i=1; ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $ks->Kasus->name() }}</td>

                    @foreach ($users as $k)
                    <th class="col-1">{{ $k->kriteria }}</th>
                    @endforeach

                    <td class="">
                        <a href="{{ route('edit_kriteria', $ks->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                    </td>
                </tr>
                <?php $i++; ?>
            </tbody>
            @endforeach

        </table>
        {{-- @endforeach --}}
    </div>
@endsection
