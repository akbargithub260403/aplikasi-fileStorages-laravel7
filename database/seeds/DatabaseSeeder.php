<?php

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
        DB::table('users')->insert([
            'role'      => 'admin',
            'name'      => 'farhan setiawan',
            'email'     => 'farhan@gmail.com',
            'prodi'     => '',
            'password'  => Hash::make('12345678'),
            'jabatan'   => 'Dosen S1',
            'avatar'    => '1598917884_img-1.jpg'
        ]);

        DB::table('users')->insert([
            'role'      => 'super_admin',
            'name'      => 'Sandika pratama',
            'email'     => 'sandprata@gmail.com',
            'prodi'     => '',
            'password'  => Hash::make('12345678'),
            'jabatan'   => 'Dosen S3',
            'avatar'    => '1598878148_profile.jpg'
        ]);

        DB::table('users')->insert([
            'role'      => 'students',
            'name'      => 'Yudi alamsyah',
            'email'     => 'yudisaja@gmail.com',
            'prodi'     => '',
            'password'  => Hash::make('12345678'),
            'jabatan'   => 'Mahasiswa',
            'avatar'    => '1599187642_chadengle.jpg'
        ]);

        
    }
}
