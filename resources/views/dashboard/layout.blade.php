<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>

  <main class="">
      <div class="container py-4 p-3">
        <header class="pb-3 mb-4 border-bottom ">
            <div class="row">
                <div class="col-5">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                        <img src="{{ url('assets\images\dairy-products.png') }}" alt="t" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
                        {{-- <svg href="public\assets\images\dairy-products.png" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg> --}}
                        <span class="fs-4">SPK-WP</span>
                      </a>

                </div>
                <div class="col-7">
                    <div class="container">
                        <ul class="list-inline list-group-horizontal h4">
                          <li class="list-inline-item text-black">
                            <a class="nav-link text-dark"href="{{ route('home') }}">Beranda</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="nav-link text-dark" href="{{ route('kasus') }}">Kasus</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="nav-link text-dark" href="{{ route('kriteria') }}">Kriteria</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="nav-link text-dark" href="{{ route('sub_kriteria') }}">Sub Kriteria</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="nav-link text-dark" href="{{ route('alternatif') }}">Alternatif</a>
                          </li>
                          <li class="list-inline-item">
                            <a class="nav-link text-dark" href="{{ route('nilai_alternatif') }}">Nilai Alternatif</a>
                          </li>

                        </ul>
                    </div>
                </div>
            </div>
          </header>
      <div class="p-5 mb-4 bg-light rounded-3 border rounded-3 bg-gradient">
        <div class="container-fluid py-5 ">
            @yield('body')
        </div>
      </div>
      {{-- <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Change the background</h2>
            <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
          </div>
        </div>
      </div> --}}

      <footer class="pt-3 mt-4 text-muted border-top text-center">
        &copy; 2021
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</main>
</html>
