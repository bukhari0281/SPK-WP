@extends('dashboard.layout')

@section('body')
    <p class="card-title">Hasil Pembobotan</p>
    <div class="pb-3"><a href="{{ route('kasus') }}" class="btn btn-primary text-white">< Kembali</a></div>
    <div class="card" style="width: 60rem;">
        <div class="card-header">
            <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
        </div>
            <div class="card-body ">

                <table class="table table-borderless">
                    <thead  class="text-center">
                    <tr>

                        @foreach ($kriterias->get_kriteria as $k)

                        <th scope="col">{{ $k->kode }} = bobot ({{ $k->bobot }})</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody  class="text-center">
                        <tr>
                            @foreach ($bobots as $d)
                            <td>= {{ $d }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>


    <div class="">

    </div>
@endsection
