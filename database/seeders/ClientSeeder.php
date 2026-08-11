<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'PT. Surya Industri Indonesia', 'logo' => 'assets/img/clients/client-1.png'],
            ['name' => 'CV. Karya Teknik Mandiri', 'logo' => 'assets/img/clients/client-2.png'],
            ['name' => 'PT. Nusantara Logistik', 'logo' => 'assets/img/clients/client-3.png'],
            ['name' => 'PT. Cipta Konstruksi Sejahtera', 'logo' => 'assets/img/clients/client-4.png'],
            ['name' => 'Kawasan Industri Gresik', 'logo' => 'assets/img/clients/client-5.png'],
            ['name' => 'Mitra Industri Jawa Tengah', 'logo' => 'assets/img/clients/client-6.png'],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['name' => $client['name']], $client);
        }
    }
}
