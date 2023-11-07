@extends('dashboard.layout')

@section('body')
    <p class="card-title">Hasil Pembobotan</p>
    <div class="pb-3"><a href="{{ route('kasus') }}" class="btn btn-primary text-white">< Kembali</a></div>
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
                        <th scope="col">Pembobotan</th>
                    </tr>
                    </thead>
                    <tbody  class="text-center">
                        <?php $i=1; ?>
                        <tr>
                            @foreach ($kriterias->get_kriteria as $item)
                            {{-- <td>{{ $i }}</td> --}}
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->bobot }}</td>
                            <td>
                                <ul class="list-inline">
                                    @foreach ($results as $result)
                                        <li class="list-inline-item">{{ $result }}</li>
                                    @endforeach
                                </ul>

                            </td>


                        </tr>
                        @endforeach
                                <?php $i++; ?>

                            </tbody>

                        </table>
            </div>
    </div>


    <div class="">

    </div>
@endsection
