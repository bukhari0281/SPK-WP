@extends('dashboard.layout')

@section('body')
<div class="pb-3">
    <a href="{{ route('kasus') }}" class="btn btn-primary text-white"> Kembali</a>
</div>
    <div class="card-title">

        <h1 class="text-center">Kasus {{ $detail_kasus->name }}</h1>
    </div>
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
        </div>
            <div class="card-body ">

                <table class="table table-borderless">
                    <thead  class="text-center">
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Bobot</th>
                    </tr>
                    </thead>
                    <tbody  class="text-center">
                        <?php $i=1; ?>
                        @forelse ($detail_kasus->get_kriteria as $item)
                        <tr>
                            {{-- <td>{{ $i }}</td> --}}
                            <td >{{ $i++ }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>
                                {{ $item->bobot }}

                                        @empty



                                <p>
                                    Tidak ada data
                                </p>

                                @endforelse
                            </td>


                        </tr>
                                <?php $i++; ?>

                            </tbody>

                        </table>
                        <a href="{{ route('pembobotan', $detail_kasus->id) }}" class="btn btn-primary text-white">tes</a>
            </div>
    </div>

@endsection
