<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'Kasirku',
            'alamat' => 'Jl. Manila Masaran RT 32 RW 11, Masaran, Sragen, Jawa Tengah',
            'telepon' => '085879050561',
            'tipe_nota' => 1, // kecil
            'diskon' => 5,
            'path_logo' => '/img/logo.jpg',
            'path_kartu_member' => '/img/member.png',
        ]);
    }
}
