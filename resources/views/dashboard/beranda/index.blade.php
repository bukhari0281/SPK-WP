@extends('dashboard.layout')

@section('body')
<div class="row">
    <div class="row mb-4">
        <div class="col-4">
            <div class="card text-bg-primary    ">
                <div class="card-body">
                    <h1 class="card-title ">Kasus</h1>
                    <p class="card-text  display-1 text-center">{{ $kasus->count() }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Kriteria</h1>
                  <p class="card-text display-1 text-center">{{ $kriteria->count() }}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">Peserta</h1>
                <p class="card-text display-1 text-center">{{ $alternatif->count() }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
