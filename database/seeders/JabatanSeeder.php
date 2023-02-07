<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_jabatan = [
            [
                'nama_jabatan' => 'Kepala Madrasah',
                'besar_tunjangan' => '100000',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Madrasah',
                'besar_tunjangan' => '200000',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Bid. Kurikulum',
                'besar_tunjangan' => '300000',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Bid. Kesiswaan',
                'besar_tunjangan' => '400000',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Bid. SarPras',
                'besar_tunjangan' => '500000',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Bid. Humas',
                'besar_tunjangan' => '600000',
            ],
            [
                'nama_jabatan' => 'Kepala Perpustakaan',
                'besar_tunjangan' => '700000',
            ],
            [
                'nama_jabatan' => 'Kepala Lab Komputer',
                'besar_tunjangan' => '800000',
            ]
        ];

        DB::table('jabatan')->insert($data_jabatan);
    }
}
