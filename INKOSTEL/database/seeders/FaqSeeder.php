<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::create([
            'kategori' => 'Umum',
            'pertanyaan' => 'Apa itu Narahubung Promosi Kos?',
            'jawaban' => 'Narahubung Promosi Kos adalah platform yang membantu pemilik kost mempromosikan properti mereka dan membantu pencari kost menemukan tempat tinggal yang sesuai dengan kebutuhan mereka.'
        ]);

        Faq::create([
            'kategori' => 'Umum',
            'pertanyaan' => 'Bagaimana cara menggunakan Narahubung Promosi Kos?',
            'jawaban' => 'Anda dapat menggunakan platform ini dengan mendaftar sebagai pemilik kost atau pencari kost, kemudian mulai menjelajahi daftar kost yang tersedia atau mengunggah informasi tentang kost Anda.'
        ]);

        Faq::create([
            'kategori' => 'Pendaftaran',
            'pertanyaan' => 'Bagaimana cara mendaftar sebagai pemilik kost?',
            'jawaban' => 'Untuk mendaftar sebagai pemilik kost, kunjungi halaman pendaftaran, isi formulir yang disediakan, dan verifikasi email Anda untuk mengaktifkan akun.'
        ]);

        Faq::create([
            'kategori' => 'Pendaftaran',
            'pertanyaan' => 'Apakah ada biaya untuk mendaftar?',
            'jawaban' => 'Pendaftaran sebagai pemilik kost di Narahubung Promosi Kos adalah gratis.'
        ]);

        Faq::create([
            'kategori' => 'Pencarian Kos',
            'pertanyaan' => 'Bagaimana cara mencari kost di Narahubung Promosi Kos?',
            'jawaban' => 'Anda dapat mencari kost dengan menggunakan fitur pencarian di halaman utama, filter berdasarkan lokasi, harga, dan fasilitas yang diinginkan.'
        ]);

        Faq::create([
            'kategori' => 'Pencarian Kos',
            'pertanyaan' => 'Apakah saya bisa melihat foto kost sebelum mengunjungi?',
            'jawaban' => 'Ya, setiap listing kost dilengkapi dengan foto dan deskripsi lengkap untuk membantu Anda membuat keputusan.'
        ]);

        Faq::create([
            'kategori' => 'Fasilitas',
            'pertanyaan' => 'Fasilitas apa saja yang biasanya tersedia di kost?',
            'jawaban' => 'Fasilitas yang tersedia bervariasi tergantung pada masing-masing kost, tetapi umumnya termasuk akses internet, laundry, dapur bersama, dan ruang tamu.'
        ]);

        Faq::create([
            'kategori' => 'Fasilitas',
            'pertanyaan' => 'Apakah ada kost yang menerima tamu?',
            'jawaban' => 'Beberapa kost memiliki kebijakan yang memperbolehkan tamu. Pastikan untuk memeriksa deskripsi listing kost untuk informasi lebih lanjut.'
        ]);

        Faq::create([
            'kategori' => 'Pembayaran',
            'pertanyaan' => 'Bagaimana cara melakukan pembayaran sewa kost?',
            'jawaban' => 'Pembayaran sewa kost dapat dilakukan melalui transfer bank, pembayaran online, atau metode lain yang disepakati antara pemilik kost dan penyewa.'
        ]);

        Faq::create([
            'kategori' => 'Pembayaran',
            'pertanyaan' => 'Apakah saya perlu membayar deposit?',
            'jawaban' => 'Beberapa pemilik kost mungkin meminta deposit sebagai jaminan. Pastikan untuk menanyakan hal ini saat bernegosiasi dengan pemilik kost.'
        ]);
    }
}
