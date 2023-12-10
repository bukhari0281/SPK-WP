@extends('dashboard.layout')

@section('body')
<div class="pb-3">
    <a href="{{ route('kasus') }}" class="btn btn-primary text-white"> Kembali</a>
</div>
    <div class="card-title">

        <h1 class="text-center">Kasus {{ $detail_kasus->name }}</h1>
    </div>
    <div class="row ">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
                </div>
                    <div class="card-body">
                        <table class="table table-borderless  pb-1">
                            <thead  class="">
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-1">Kode</th>
                                <th class="col-3">Kriteria</th>
                                <th class="col-1">Bobot</th>
                                <th class="col-2 text-center">Sub Kriteria</th>
                                <th class="col-2 text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($detail_kasus->get_kriteria as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td >{{ $item->bobot }}</td>
                                    <td class="text-center">
                                        [ {{ $item->get_subkriteria->count() }}     ] Data
                                        {{-- <a href="{{ route('create_sub_kriteria', $item->id) }}" class="btn btn-sm btn-primary text-white">+</a> --}}
                                        <a href="{{ route('create_sub_kriteria', $item->id) }}" class="btn btn-sm btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#add-sub-kriteria" >+</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('edit_kriteria', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger text-white">Del</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>
                                <hr>
                                <a href="{{ route('pembobotan.lihat', $detail_kasus->id) }}" class="btn btn-primary text-white mt-1">Normalisasi Pembobotan</a>
                    </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="p p-2 pb-1 text-center">Data Bobot</h3>
                </div>
                    <div class="card-body text-center">

                        <table class="table table-borderless  pb-1">
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
                                <hr>
                                <a href="{{ route('pembobotan', $detail_kasus->id) }}" class="btn btn-primary text-white mt-1">Normalisasi Pembobotan</a>
                    </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
  <div class="modal fade" id="add-sub-kriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('store_sub_kriteria') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

            <h1 class="modal-title fs-5" id="exampleModalLabel">Sub Kriteria</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                {{-- <p>{{ $data }}</p> --}}
                {{-- <input type="hidden" name="alternatif" value="{{ $data->id }}"> --}}
                {{-- <input type="text" id="kriteria_id" name="kriteria_id"> --}}
                <select name="kriteria_id" id="kriteria" class="form-control">
                    @foreach($kriteria as $item)
                        <option value="{{ $item->id }}" {{ (isset($selectedKriteria) && $selectedKriteria->id == $item->id) ? 'selected' : '' }}>{{ $item->name() }}</option>
                    @endforeach
                </select>
                <div class="">
                    <label for="kode_sub_kriteria" class="form-label">Kode Sub Kriteria</label>
                    <input type="text"
                      class="form-control form-control-sm" name="kode_sub_kriteria" id="kode_sub_kriteria" aria-describedby="helpId" placeholder="kode_sub_kriteria" value="{{ Session::get('kode_sub_kriteria') }}">
                  </div>
                  <div class="">
                    <label for="name" class="form-label">Sub Kriteria</label>
                    <input type="text"
                      class="form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="name" value="{{ Session::get('name') }}">
                  </div>
                  <div class="">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number"
                      class="form-control form-control-sm" name="nilai" id="nilai" aria-describedby="helpId" placeholder="nilai" value="{{ Session::get('nilai') }}">
                  </div>

                  <div class="">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <input type="text"
                        class="form-control form-control-sm" name="keterangan" id="keterangan" aria-describedby="helpId" placeholder="keterangan" value="{{ Session::get('keterangan') }}">
                      </div>
            </div>
            <br>
            {{-- <button class="btn btn-primary text-white" name="simpan" type="submit">Simpan</button> --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </div>
    </form>
  </div>
@endsection
