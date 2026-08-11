<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Distribusi Gas CNG Industri Jawa Timur',
                'slug' => 'distribusi-gas-cng-industri-jawa-timur',
                'category' => 'Transportasi CNG',
                'client_name' => 'PT. Surya Industri Indonesia',
                'location' => 'Surabaya & Gempol, Jawa Timur',
                'completion_date' => '2024',
                'short_description' => 'Pengiriman dan pendistribusian gas alam CNG secara kontinu menggunakan armada Gas Transport Module (GTM).',
                'full_description' => 'Proyek pendistribusian Gas Alam Terkompresi (CNG) menggunakan armada Gas Transport Module (GTM) berkapasitas tinggi untuk memenuhi suplai bahan bakar industri manufaktur di kawasan Jawa Timur. Proyek ini menjamin ketersediaan energi 24/7 dengan penerapan standar keselamatan K3 ketat.',
                'features' => [
                    'Armada GTM kapasitas tinggi bersertifikasi',
                    'Monitoring tekanan dan volume gas real-time',
                    'Penerapan standar keselamatan kerja K3 ketat',
                    'Pasokan energi berkelanjutan tanpa henti'
                ],
                'image' => 'assets/img/tabs-1.jpg',
            ],
            [
                'title' => 'Konstruksi Pemasangan Pipa Gas Industri',
                'slug' => 'konstruksi-pemasangan-pipa-gas-industri',
                'category' => 'Infrastruktur Gas',
                'client_name' => 'Kawasan Industri Gresik',
                'location' => 'Gresik, Jawa Timur',
                'completion_date' => '2024',
                'short_description' => 'Pembangunan dan penyambungan jaringan pipa gas alam industri untuk menyalurkan pasokan dari sumur gas ke pabrik.',
                'full_description' => 'Pekerjaan konstruksi jaringan pipa gas alam tekanan menengah hingga tinggi yang menghubungkan jaringan pipa utama ke metering station pelanggan industri. Mencakup pekerjaan civil trenching, welding pipe, NDT testing, dan hydrostatic pressure test.',
                'features' => [
                    'Pengelasan pipa standar API 1104',
                    'Pengujian Hydrotest & Radiography Test (NDT)',
                    'Sistem katup pengaman otomatis (Emergency Shut-Off Valve)',
                    'Dokumentasi As-Built Drawing & Sertifikat Layak Operasi'
                ],
                'image' => 'assets/img/tabs-2.jpg',
            ],
            [
                'title' => 'Pembangunan Pabrik & Pekerjaan Civil Mechanical',
                'slug' => 'pembangunan-pabrik-pekerjaan-civil-mechanical',
                'category' => 'Layanan Konstruksi',
                'client_name' => 'CV. Karya Teknik Mandiri',
                'location' => 'Sidoarjo, Jawa Timur',
                'completion_date' => '2023',
                'short_description' => 'Pelaksanaan pembangunan gedung pabrik baru meliputi struktur civil, mekanikal, dan fabrikasi baja.',
                'full_description' => 'Proyek konstruksi gedung pabrik manufaktur mencakup pekerjaan pondasi struktur beton bertulang, konstruksi rangka baja gudang, instalasi mechanical ventilation, serta sistem perpipaan utilitas pendukung.',
                'features' => [
                    'Konstruksi rangka baja span lebar',
                    'Pekerjaan lantai beton heavy-duty industri',
                    'Manajemen keselamatan proyek terpadu',
                    'Penyelesaian tepat waktu sesuai skedul masterplan'
                ],
                'image' => 'assets/img/tabs-3.jpg',
            ],
            [
                'title' => 'Instalasi Electrical & Substation Power',
                'slug' => 'instalasi-electrical-substation-power',
                'category' => 'Electrical',
                'client_name' => 'PT. Nusantara Logistik',
                'location' => 'Kawasan Industri Pasuruan',
                'completion_date' => '2024',
                'short_description' => 'Perancangan dan pemasangan jaringan kelistrikan tegangan menengah dan panel distribusi daya industri.',
                'full_description' => 'Pemasangan trafo distribusi, main switchboard panel (MSB), jaringan kabel power underground, serta grounding system untuk memastikan keandalan pasokan listrik pada fasilitas produksi pabrik.',
                'features' => [
                    'Panel listrik berstandar IEC/SPLN',
                    'Penangkal petir dan proteksi arus lebih',
                    'Integrasi genset cadangan otomatis (ATS/AMF)',
                    'Commissioning test & Uji Beban Listrik'
                ],
                'image' => 'assets/img/features-1.jpg',
            ],
            [
                'title' => 'Pengembangan Fasilitas Pressure Reducing Station (PRS)',
                'slug' => 'pengembangan-fasilitas-pressure-reducing-station-prs',
                'category' => 'Infrastruktur Gas',
                'client_name' => 'PT. Cipta Konstruksi Sejahtera',
                'location' => 'Mojokerto, Jawa Timur',
                'completion_date' => '2024',
                'short_description' => 'Fabrikasi dan instalasi modul penurun tekanan gas (PRS) untuk menyesuaikan tekanan CNG ke burner industri.',
                'full_description' => 'Pekerjaan perakitan dan instalasi modul Pressure Reducing Station (PRS) 2-stage reducer yang dilengkapi heater system dan metering kit untuk pengoperasian sistem energi CNG yang stabil dan efisien.',
                'features' => [
                    'Dual stream regulator system (Duty & Standby)',
                    'Water bath heater penstabil suhu gas',
                    'Digital gas flow meter dengan kalibrasi resmi',
                    'Sistem alarm kebocoran gas otomatis'
                ],
                'image' => 'assets/img/features-2.jpg',
            ],
            [
                'title' => 'Maintenance & Revamping Sistem Perpipaan Industri',
                'slug' => 'maintenance-revamping-sistem-perpipaan-industri',
                'category' => 'Maintenance & Engineering',
                'client_name' => 'Mitra Industri Jawa Tengah',
                'location' => 'Semarang, Jawa Tengah',
                'completion_date' => '2023',
                'short_description' => 'Pemeliharaan berkala dan perbaikan sistem utilitas pipa pabrik untuk menjaga performa operasional.',
                'full_description' => 'Layanan perawatan dan peremajaan (revamping) jalur perpipaan utilitas uap dan gas industri. Mencakup penggantian gasket, penggantian valve, pengujian ketahanan tekanan, dan recoating anti-korosi.',
                'features' => [
                    'Inspeksi visual & pengukuran ketebalan dinding pipa (UT)',
                    'Penggantian komponen valve & fitting presisi',
                    'Pengecatan ulang & pelapisan anti-karat',
                    'Garansi pengerjaan & laporan perawatan berkala'
                ],
                'image' => 'assets/img/features-3.jpg',
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
    }
}
