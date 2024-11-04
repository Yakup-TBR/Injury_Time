<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

</head>

<body>
    @extends('partial.navbar')

    @section('isi')

    <div class="container my-5">
        <div class="row">
            <!-- Kolom kiri dengan ikon -->
            <div class="col-md-4 text-center d-flex flex-column align-items-center justify-content-center" id="contact-icons">
                <div class="contact-icon my-3">
                    <i class="bi bi-whatsapp fa-2x text-success"></i>
                    <p>+62 812 3456 7890</p>
                </div>
                <div class="contact-icon my-3">
                    <i class="bi bi-envelope fa-2x text-danger"></i>
                    <p>inkostel@gmail.com</p>
                </div>
                <div class="contact-icon my-3">
                    <i class="bi bi-geo-alt fa-2x text-primary"></i>
                    <p>Jl. Telekomunikasi No.1 Buah Batu, Bandung</p>
                </div>
            </div>

            <!-- Kolom kanan dengan form -->
            <div class="col-md-8">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header text-center" id="card-head">
                                <h2>Contact Us</h2>
                                <p class="mb-0">Hubungi kami atau Beritahu bagaimana kami dapat meng-upgrade Inkostel!</p>
                            </div>

                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <!-- Name Field -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Username</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan username anda" required>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
                                    </div>

                                    <!-- Subject Field -->
                                    <div class="mb-3">
                                        <label for="subject" class="form-label fw-bold">Subjek</label>
                                        <select class="form-select" id="subject" name="subject" required>
                                            <option value="Penambahan Fitur">Penambahan Fitur</option>
                                            <option value="Tampilan Website">Tampilan Website</option>
                                            <option value="Bug">Bug</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <!-- Message Field -->
                                    <div class="mb-3">
                                        <label for="message" class="form-label fw-bold">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Jelaskan pendapatmu disini..." required></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-lg">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
