@extends('dashboard.layout')

@section('body')
<div class="pb-3">
    <a href="{{ route('alternatif') }}" class="btn btn-outline-primary"><< Kembali</a>
</div>
<br>
<div class="row">
    <div class="col-4  text-center">
        <div class="card">
            <div class="card-header">
                <h3 class="p p-2 pb-1 text-center">Data Alternatif</h3>
            </div>
                <div class="card-body text-center">
                    <table class="table table-borderless  pb-1">
                        <thead  class="text-center">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Alternatif</th>
                        </tr>
                        </thead>
                        <tbody  class="text-center">
                            <tr>
                                <td>{{ $detail_alternatif->kode }}</td>
                                <td>{{ $detail_alternatif->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="p p-2 pb-1 text-center">Data Sub Kriteria yang Dipilih</h3>
            </div>
                <div class="card-body text-center">
                    <table class="table table-borderless  pb-1">
                        <thead  class="text-center">
                        <tr>
                            <th scope="col">Sub Kriteria</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody  class="text-center">
                            {{-- @if ($item->sub_kriteria) --}}
                            @foreach ($sub_kriteria as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->nilai }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                                    <a href="" class="btn btn-sm btn-primary text-white">Edit</a>
                                </td>

                            </tr>
                                {{-- @endif --}}
                                @endforeach

                        </tbody>
                    </table>
                            <hr>
                            {{-- <a href="{{ route('create_sub_kriteria', $detail_alternatif->id) }}" class="btn btn-primary text-white mt-1">+ Sub Kriteria</a> --}}
                            <!-- Button trigger modal -->
                            <a href="#" class="btn btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" >Tambah Sub</a>
                </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Sub Criteria -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('add_sub_kriteria',  ['id' => $detail_alternatif->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{-- <input type="hidden" name="alternatif" value="{{ $alternatif->id }}"> --}}
            <div class="form-group">
                <input type="hidden" id="alternatif_id" name="alternatif_id" >
                <label for="sub_kriteria">Pilih Sub Kriteria:</label>
                <select name="sub_kriteria_id" id="sub_kriteria" class="form-control">
                    @foreach($s_kriteria as $sub_kriteria)
                        <option value="{{ $sub_kriteria->id }}">{{ $sub_kriteria->name() }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            {{-- <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button> --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </form>
</div>
@endsection
