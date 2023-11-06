@extends('dashboard.layout')

@section('body')
<div class="pb-3"><a href="{{ route('create_kasus') }}" class="btn btn-primary text-white"> Kembali</a></div>
    <div class="card-title">

        <h1 class="text-center">Kasus</h1>
    </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                <h5 class="">Kasus</h5>
            </div>
                <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Bobot</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>

                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $detail_kasus->kode }}</td>
                                <td>{{ $detail_kasus->bobot }}</td>
                            </tr>
                            <?php $i++; ?>
                        </tbody>
                    </table>
                </ul>
                <a href="#" class="btn btn-primary text-white">Go somewhere</a>
                </div>
        </div>
@endsection
