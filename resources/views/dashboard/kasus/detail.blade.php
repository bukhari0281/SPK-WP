@extends('dashboard.layout')

@section('body')
<div class="pb-3"><a href="{{ route('kasus') }}" class="btn btn-primary text-white"> Kembali</a></div>
    <div class="card-title">

        <h1 class="text-center">Kasus {{ $detail_kasus->name }}</h1>
    </div>
        <div class="card" style="">
            <div class="card-header">
                <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
            </div>
                <div class="card-body ">

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bobot</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>

                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <ul>

                                            @forelse ($detail_kasus->get_kriteria as $item)
                                            <li>
                                                {{ $item->bobot }}
                                            </li>
                                            @empty
                                            <p>
                                                Tidak ada data
                                            </p>
                                            @endforelse

                                    </ul>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        </tbody>
                    </table>

                <a href="#" class="btn btn-primary text-white mt-2 text-center">Normalisasikan Bobot</a>
                </div>
        </div>
@endsection
