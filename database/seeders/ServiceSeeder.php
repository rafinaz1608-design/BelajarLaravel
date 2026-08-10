<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Transportasi & Distribusi CNG',
                'slug' => 'transportasi-distribusi-cng',
                'icon' => 'bi bi-truck',
                'color_class' => 'item-cyan',
                'short_description' => 'Melayani perdagangan dan pendistribusian Gas Alam Terkompresi (CNG) menggunakan Gas Transport Module (GTM) untuk memenuhi kebutuhan energi berbagai sektor industri.',
                'full_description' => 'PT. Pratama Energy Mandiri menyediakan layanan pendistribusian Gas Alam Terkompresi (Compressed Natural Gas / CNG) sebagai opsi energi bersih, ekonomis, dan efisien bagi sektor manufaktur dan industri. Dengan dukungan armada Gas Transport Module (GTM) yang modern dan sesuai standar regulasi keselamatan ketat, kami menjamin kepastian pasokan energi secara terus-menerus dan terintegrasi.',
                'features' => [
                    'Pengiriman energi gas bersih & efisien untuk industri',
                    'Armada Gas Transport Module (GTM) berstandar keselamatan tinggi',
                    'Monitoring pasokan gas real-time 24/7',
                    'Dukungan sistem Pressure Regulating System (PRS) handal'
                ],
                'image' => 'assets/img/services.jpg',
            ],
            [
                'title' => 'Pengembangan Infrastruktur Gas',
                'slug' => 'pengembangan-infrastruktur-gas',
                'icon' => 'bi bi-fuel-pump',
                'color_class' => 'item-orange',
                'short_description' => 'Menyediakan pembangunan jaringan pipa gas alam dan fasilitas pendukung untuk mendukung distribusi energi yang efisien, aman, dan berkelanjutan.',
                'full_description' => 'Kami melayani jasa perancangan, pembangunan, dan pengelolaan fasilitas infrastruktur gas alam, termasuk instalasi jaringan perpipaan gas, stasiun penurunan tekanan (PRU/PRS), serta integrasi fasilitas pendukung pabrik. Tim teknis berpengalaman kami memastikan seluruh jaringan memenuhi standar kualitas dan keamanan internasional.',
                'features' => [
                    'Pembangunan jaringan perpipaan gas alam industri',
                    'Instalasi Pressure Reduction Unit (PRU) / Regulating Station',
                    'Pengujian tekanan, purging, dan commissioning sistem',
                    'Inspeksi keselamatan dan sertifikasi kelayakan teknis'
                ],
                'image' => 'assets/img/services.jpg',
            ],
            [
                'title' => 'Konstruksi Sipil (Civil Construction)',
                'slug' => 'konstruksi-sipil',
                'icon' => 'bi bi-building',
                'color_class' => 'item-teal',
                'short_description' => 'Melayani pembangunan gedung, pabrik, infrastruktur, dan berbagai pekerjaan konstruksi sipil sesuai standar mutu dan keselamatan kerja.',
                'full_description' => 'Jasa konstruksi sipil kami mencakup penyiapan lahan, pondasi struktur, pembangunan gedung pabrik, pergudangan, fasilitas komersial, serta infrastruktur pendukung industri. Kami menjamin ketepatan waktu pengerjaan dan kualitas material sesuai dengan spesifikasi teknis proyek.',
                'features' => [
                    'Pembangunan struktur gedung pabrik & gudang industri',
                    'Pekerjaan tanah, pemancangan, dan pondasi beton bertulang',
                    'Konstruksi drainase, jalan kawasan, dan pagar pembatas',
                    'Manajemen proyek sipil dengan standar ISO & K3'
                ],
                'image' => 'assets/img/services.jpg',
            ],
            [
                'title' => 'Mechanical & Electrical',
                'slug' => 'mechanical-electrical',
                'icon' => 'bi bi-gear-wide-connected',
                'color_class' => 'item-red',
                'short_description' => 'Menyediakan pekerjaan instalasi mekanikal dan elektrikal untuk kebutuhan industri, pabrik, maupun fasilitas komersial dengan tenaga kerja profesional.',
                'full_description' => 'Divisi Mechanical & Electrical kami menangani instalasi mesin pabrik, sistem tata udara (HVAC), instalasi kelistrikan daya besar, panel distribusi listrik, generator set, dan sistem otomatisasi industri. Kami hadir untuk mengoptimalkan kinerja operasional fasilitas Anda.',
                'features' => [
                    'Instalasi sistem kelistrikan & trafo daya industri',
                    'Pemasangan peralatan mekanikal & pemipaan utility',
                    'Sistem pencahayaan, grounding, dan penangkal petir',
                    'Testing, balancing, dan commissioning sistem ME'
                ],
                'image' => 'assets/img/services.jpg',
            ],
            [
                'title' => 'Maintenance & New Building',
                'slug' => 'maintenance-new-building',
                'icon' => 'bi bi-tools',
                'color_class' => 'item-indigo',
                'short_description' => 'Memberikan layanan pemeliharaan fasilitas industri, renovasi, serta pembangunan gedung baru untuk menjaga produktivitas dan kualitas operasional pelanggan.',
                'full_description' => 'Layanan perawatan berkala (*routine maintenance*) dan renovasi gedung untuk menjaga reliabilitas fasilitas produksi industri. Kami memberikan layanan perbaikan darurat, perawatan preventif, serta perluasan bangunan gedung pabrik sesuai kebutuhan perkembangan usaha Anda.',
                'features' => [
                    'Pemeliharaan berkala fasilitas gedung & infrastruktur',
                    'Renovasi & retrofit fasilitas industri',
                    'Pekerjaan penyempurnaan estetika & keandalan bangunan',
                    'Layanan respons cepat untuk perbaikan darurat'
                ],
                'image' => 'assets/img/services.jpg',
            ],
            [
                'title' => 'Solusi Terintegrasi',
                'slug' => 'solusi-terintegrasi',
                'icon' => 'bi bi-diagram-3',
                'color_class' => 'item-pink',
                'short_description' => 'Menghadirkan layanan terpadu mulai dari distribusi CNG, pembangunan infrastruktur energi, hingga jasa konstruksi untuk memberikan solusi terbaik bagi setiap klien.',
                'full_description' => 'PT. Pratama Energy Mandiri bertindak sebagai mitra solusi lengkap (Turnkey Project Provider) dari tahap perencanaan awal, pengadaan energi, konstruksi fasilitas, hingga pemeliharaan jangka panjang. Pendekatan terpadu ini memberikan efisiensi biaya dan kemudahan pengelolaan bagi setiap klien.',
                'features' => [
                    'Perencanaan & konsultasi proyek energi-konstruksi end-to-end',
                    'Integrasi pengadaan energi CNG & fasilitas infrastruktur',
                    'Single point of contact untuk efisiensi komunikasi & biaya',
                    'Layanan purna jual & kemitraan berkelanjutan'
                ],
                'image' => 'assets/img/services.jpg',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
