<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $p) {
            Province::create([
                'province_id' => $p['province_id'],
                'title' => $p['province'],
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($p['province_id'])->get();
    
            foreach ($daftarKota as $d) {
                City::create([
                    'province_id' => $p['province_id'],
                    'city_id' => $d['city_id'],
                    'title' => $d['city_name'],
                ]);
            }
        }
    }
}
