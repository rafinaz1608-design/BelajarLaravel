<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Bapak Budi Santoso',
                'company' => 'PT. Surya Industri Indonesia',
                'role' => 'Plant Manager',
                'content' => 'Pelayanan yang diberikan sangat profesional dan responsif. Proses distribusi CNG berjalan sesuai jadwal dengan standar keselamatan yang baik. Kami sangat puas dengan kualitas layanan PT. Pratama Energy Mandiri.',
                'rating' => 5,
                'avatar' => 'assets/img/testimonials/default-avatar.png',
            ],
            [
                'client_name' => 'Ir. Hendra Wijaya',
                'company' => 'CV. Karya Teknik Mandiri',
                'role' => 'Project Director',
                'content' => 'Tim konstruksi bekerja dengan rapi, tepat waktu, dan sesuai spesifikasi teknis proyek. Komunikasi selama pengerjaan juga sangat transparan sehingga pekerjaan dapat diselesaikan dengan lancar.',
                'rating' => 5,
                'avatar' => 'assets/img/testimonials/default-avatar.png',
            ],
            [
                'client_name' => 'Ibu Ratna Dewi',
                'company' => 'PT. Nusantara Logistik',
                'role' => 'Head of Supply Chain',
                'content' => 'Kami mempercayakan kebutuhan energi fasilitas perusahaan kepada PT. Pratama Energy Mandiri karena ketersediaan armada CNG yang selalu tepat waktu dan didukung oleh teknisi yang berpengalaman.',
                'rating' => 5,
                'avatar' => 'assets/img/testimonials/default-avatar.png',
            ],
            [
                'client_name' => 'Bapak Agung Prasetyo',
                'company' => 'PT. Cipta Konstruksi Sejahtera',
                'role' => 'General Manager',
                'content' => 'Mulai dari tahap perencanaan hingga eksekusi pengerjaan jaringan gas, seluruh proses dijalankan dengan profesionalisme dan standar K3 yang tinggi. Kemitraan yang sangat menguntungkan.',
                'rating' => 5,
                'avatar' => 'assets/img/testimonials/default-avatar.png',
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name'], 'company' => $t['company']], $t);
        }
    }
}
