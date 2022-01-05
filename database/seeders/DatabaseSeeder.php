<?php

namespace Database\Seeders;

use App\Models\AkunZoomModel;
use App\Models\RequestPinjamModel;
use App\Models\StatusAksiModel;
use App\Models\User;
use App\Models\StatusModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin Fakultas',
            'level' => 'Admin',
            'email' => 'Admin@Fakultas.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'User Mahasiswa',
            'level' => 'User',
            'email' => 'User@Mahasiswa.com',
            'password' => bcrypt('12345')
        ]);
        
        StatusModel::create([
            'status_field' => 'Selesai',
            'status_field_boolean' => '1',
        ]);
        
        StatusModel::create([
            'status_field' => 'Dipinjam',
            'status_field_boolean' => '0',
        ]);
        
        StatusAksiModel::create([
            'status_fieldA' => 'Approved',
            'status_fieldA_boolean' => '1',
        ]);
        
        StatusAksiModel::create([
            'status_fieldA' => 'Rejected',
            'status_fieldA_boolean' => '0',
        ]);

        AkunZoomModel::create([
            'nama_akun' => 'Zoom PTI',
            'kapasitas' => '100',
            'status_peminjaman' => '1',
        ]);
        
        AkunZoomModel::create([
            'nama_akun' => 'Zoom SI',
            'kapasitas' => '200',
            'status_peminjaman' => '1',
        ]);
        
        RequestPinjamModel::create([
            'zoom_id'=> '1',
            'nama_kegiatan' => 'Rapat INTEGER', 
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 
            'tanggal' => '2021-12-31', 
            'jam' => '11:00', 
            'durasi' => '2 Jam',
            'email_user' => 'marjaya@undiksha.ac.id'
        ]);
    }
}
