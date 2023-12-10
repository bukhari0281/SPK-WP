@extends('dashboard.layout')

@section('body')
    <p class="card-title">Hasil Pembobotan</p>
    <div class="pb-3"><a href="{{ route('kasus') }}" class="btn btn-primary text-white">< Kembali</a></div>
    <div class="card">
        <div class="card-header">
            <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
        </div>
            <div class="card-body ">
                <table>
                    <thead>
                        <tr>
                            <th class="col-2">No</th>
                            <th class="col-2">Kode Kasus</th>
                            <th class="text-center">Bobot Kasus</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($kasus->bobot_kriteria as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>
                                    @foreach ($k as $item)
                                        {{ $item }}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                    <tbody  >
                        <?php $i=1; ?>
                        @forelse ($kasus->bobot_kriteria as $item)
                        <tr>
                            {{-- <td>{{ $i }}</td> --}}
                            <td >{{ $i++ }}</td>
                            <td class="text-center">{{ $kasus->kode }}</td>
                            <td class="text-center">
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
            </div>
    </div>

@endsection
