@extends('dashboard.layout')

@section('body')
<div class="row">
    <div class="row">
        <div class="col-9">
            <div class="row mb-4">
                <div class="col-sm-8">
                    <div class="card text-bg-primary    ">
                        <div class="card-body">
                            <h1 class="card-title ">Kasus</h1>
                            <p class="card-text  display-1 text-center">{{ $kasus->count() }}</p>
                            <a href="{{ route('kasus') }}" class="btn btn-light">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-bg-secondary">
                        <div class="card-body">
                            <h1 class="card-title">Kriteria</h1>
                            <p class="card-text display-1 text-center">{{ $kriteria->count() }}</p>
                            <a href="{{ route('kriteria') }}" class="btn btn-primary">Go somewhere</a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <h1 class="card-title">Peserta</h1>
                        <p class="card-text display-1 text-center">{{ $alternatif->count() }} </p>
                        <a href="{{ route('alternatif') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-warning">
                <div class="card-body">
                  <h1 class="card-title">Kriteria</h1>
                  <p class="card-text display-1 text-center">{{ $kriteria->count() }} </p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi euismod condimentum commodo. Phasellus sed lacinia lacus, sed consequat purus. Vivamus vestibulum elit turpis, non elementum augue consequat sed. Pellentesque nec ipsum consectetur, vulputate nunc porttitor, tempor mi. </p>
                  <a href="{{ route('kriteria') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
