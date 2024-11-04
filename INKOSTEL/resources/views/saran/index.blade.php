<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kotak Saran</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/jualKos.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/jualKos.css') }}">
</head>

<body>
  @extends('partial.navbar')
  <br>

  @if (session('success'))
  <br>
  <br>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
  <!-- main -->
  <section id="JualKosForm">
    <div class="container">
      <div class="text-center mt-5">
        <h2>Masukan Saran kamu</h2>
        <p>Isi Form Untuk memberikan saran</p>
      </div>

      <div class="row justify-content-center my-5">

        <div class="col-lg-6">
          <form action="{{ route('saran.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <div class="mb-4 input-group">
              <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
              </span>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kamu">
            </div>

            <div class="form-floating mb-4 mt-4">
              <textarea id="Saran" class="form-control" style="height: 140px;" name="saran"
                id="saran"></textarea>
              <label for="saran" class="form-label">Saran...</label>
            </div>

            <div class="mb-4 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </form>
        </div>
  </section>



  @section('script')
  <script src="../Bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/jualKos.js"></script>
  @endsection



</body>

</html>


