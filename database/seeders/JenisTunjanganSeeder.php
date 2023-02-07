<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JenisTunjanganSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $data_tunjangan = [
            [
                'jenis_tunjangan' => 'TPG PNS',
                'besar_tunjangan' => '100000',
            ],
            [
                'jenis_tunjangan' => 'TPG INFASING',
                'besar_tunjangan' => '200000',
            ],
            [
                'jenis_tunjangan' => 'TPG NON INFASING',
                'besar_tunjangan' => '300000',
            ],
        ];

        DB::table('jenis_tunjangan')->insert($data_tunjangan);
    }
}
