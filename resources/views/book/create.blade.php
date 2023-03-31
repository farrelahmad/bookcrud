<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">

      @if ($errors->any())
          <div class="pt-3">
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
              </ul>
            </div>
          </div>
      @else
          
      @endif
<!-- START FORM -->
      <form action='{{ url('book') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nmbook" class="col-sm-2 col-form-label">Nama Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nmbook' id="nmbook">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nmpenulis" class="col-sm-2 col-form-label">Nama Penulis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nmpenulis' id="nmpenulis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="halaman" class="col-sm-2 col-form-label">Halaman</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='halaman' id="halaman">
                </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button><a href='{{ url('book') }}' class="btn btn-danger ms-5">KEMBALI</a></div>
            </div>
        </div>
      </form>
        <!-- AKHIR FORM -->

        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>