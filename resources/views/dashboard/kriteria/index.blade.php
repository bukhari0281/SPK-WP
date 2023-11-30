@extends('dashboard.layout')

@section('body')
<div class="text-center mb-5">
    <div class="">
            <h1 class="display-5 fw-bold ">Kriteria</h1>
    </div>
    <div class="">
        <a href="{{ route('create_kriteria') }}" class="btn btn-outline-secondary"> + Tambah Kasus</a>

    </div>

</div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Kode Kasus</th>
                    <th class="col-1">Kode</th>
                    <th class="col-2">Kriteria</th>
                    <th class="col-2">Bobot</th>
                    <th class="col-2 text-center">Sub Kriteria</th>
                    <th class="col-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->Kasus->kode() }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->name }}</td>
                    <td >{{ $item->bobot }}</td>
                    <td class="text-center">
                        {{ $item->get_subkriteria->count() }} Data
                        <a href="{{ route('create_sub_kriteria', $item->id) }}" class="btn btn-sm btn-primary text-white">+</a>
                        <a href="{{ route('create_sub_kriteria', $item->id) }}" class="btn btn-primary btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" >++</a>

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
    </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
