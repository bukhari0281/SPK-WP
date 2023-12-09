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
                            <th class="col-2">ID</th>
                            <th>Bobot Kriteria 1</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bobot_kriterias as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>


    <div class="">

    </div>
@endsection
