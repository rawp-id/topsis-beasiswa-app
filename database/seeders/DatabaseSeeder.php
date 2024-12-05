<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Beasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        DB::table('kriterias')->insert([
            [
                'id' => 1,
                'kode' => 'C1',
                'nama' => 'Pekerjaan Orang Tua',
                'tipe' => 'cost',
                'bobot' => 5,
            ],
            [
                'id' => 2,
                'kode' => 'C2',
                'nama' => 'Tanggungan Orang Tua',
                'tipe' => 'benefit',
                'bobot' => 4,
            ],
            [
                'id' => 3,
                'kode' => 'C3',
                'nama' => 'Penghasilan Orang Tua',
                'tipe' => 'cost',
                'bobot' => 4,
            ],
            [
                'id' => 4,
                'kode' => 'C4',
                'nama' => 'Rata-rata Nilai Akhir',
                'tipe' => 'benefit',
                'bobot' => 2,
            ],
            [
                'id' => 5,
                'kode' => 'C5',
                'nama' => 'Usia Orang Tua',
                'tipe' => 'benefit',
                'bobot' => 3,
            ]
        ]);


        // Pekerjaan Ortu
        DB::table('pekerjaan_ortus')->insert([
            ['kriteria_id' => 1, 'nama' => 'Tidak Bekerja', 'keterangan' => 'Orang tua tidak bekerja', 'bobot' => 1],
            ['kriteria_id' => 1, 'nama' => 'Pedagang', 'keterangan' => 'Pekerjaan sebagai pedagang', 'bobot' => 2],
            ['kriteria_id' => 1, 'nama' => 'Informatika', 'keterangan' => 'Pekerjaan sebagai IT', 'bobot' => 3],
            ['kriteria_id' => 1, 'nama' => 'Guru', 'keterangan' => 'Pekerjaan sebagai guru', 'bobot' => 4],
            ['kriteria_id' => 1, 'nama' => 'Polisi', 'keterangan' => 'Pekerjaan sebagai polisi', 'bobot' => 4],
            ['kriteria_id' => 1, 'nama' => 'Dokter', 'keterangan' => 'Pekerjaan sebagai dokter', 'bobot' => 5],
            ['kriteria_id' => 1, 'nama' => 'Pengusaha', 'keterangan' => 'Pekerjaan sebagai pengusaha', 'bobot' => 5],
            ['kriteria_id' => 1, 'nama' => 'PNS', 'keterangan' => 'Pekerjaan sebagai Pegawai Negeri Sipil', 'bobot' => 5],
        ]);


        // Tanggungan Ortu
        DB::table('tanggungan_ortus')->insert([
            ['kriteria_id' => 2, 'nama' => 'Anak (1)', 'keterangan' => 'Orang tua memiliki 1 anak yang ditanggung', 'bobot' => 4],
            ['kriteria_id' => 2, 'nama' => 'Anak (2)', 'keterangan' => 'Orang tua memiliki 2 anak yang ditanggung', 'bobot' => 4],
            ['kriteria_id' => 2, 'nama' => 'Anak (3)', 'keterangan' => 'Orang tua memiliki 3 anak yang ditanggung', 'bobot' => 5],
            ['kriteria_id' => 2, 'nama' => 'Anak (4)', 'keterangan' => 'Orang tua memiliki 4 anak yang ditanggung', 'bobot' => 5],
            ['kriteria_id' => 2, 'nama' => 'Pasangan', 'keterangan' => 'Orang tua menanggung pasangan hidup', 'bobot' => 3],
            ['kriteria_id' => 2, 'nama' => 'Orang Tua', 'keterangan' => 'Orang tua menanggung orang tua mereka sendiri', 'bobot' => 5],
            ['kriteria_id' => 2, 'nama' => 'Saudara Kandung', 'keterangan' => 'Orang tua menanggung saudara kandung mereka', 'bobot' => 2],
            ['kriteria_id' => 2, 'nama' => 'Cucu', 'keterangan' => 'Orang tua menanggung cucu mereka', 'bobot' => 2],
            ['kriteria_id' => 2, 'nama' => 'Pembantu Rumah Tangga', 'keterangan' => 'Orang tua menanggung pembantu rumah tangga', 'bobot' => 2],
            ['kriteria_id' => 2, 'nama' => 'Keluarga Besar', 'keterangan' => 'Orang tua membiayai keluarga besar seperti paman, bibi, atau kerabat lainnya', 'bobot' => 4],
        ]);

        // Penghasilan Ortu
        DB::table('penghasilan_ortus')->insert([
            ['kriteria_id' => 3, 'nama' => 'Rp 1.000.000 - Rp 3.000.000', 'keterangan' => 'Penghasilan antara 1 juta hingga 3 juta', 'bobot' => 2],
            ['kriteria_id' => 3, 'nama' => 'Rp 3.000.000 - Rp 5.000.000', 'keterangan' => 'Penghasilan antara 3 juta hingga 5 juta', 'bobot' => 3],
            ['kriteria_id' => 3, 'nama' => 'Rp 5.000.000 - Rp 10.000.000', 'keterangan' => 'Penghasilan antara 5 juta hingga 10 juta', 'bobot' => 4],
            ['kriteria_id' => 3, 'nama' => 'Rp 10.000.000 - Rp 15.000.000', 'keterangan' => 'Penghasilan antara 10 juta hingga 15 juta', 'bobot' => 5],
            ['kriteria_id' => 3, 'nama' => 'Rp 15.000.000 - Rp 20.000.000', 'keterangan' => 'Penghasilan antara 15 juta hingga 20 juta', 'bobot' => 5],
            ['kriteria_id' => 3, 'nama' => 'Rp 20.000.000 ke atas', 'keterangan' => 'Penghasilan lebih dari 20 juta', 'bobot' => 6],
        ]);

        // Nilai
        DB::table('nilais')->insert([
            ['kriteria_id' => 4, 'nilai' => '100', 'keterangan' => 'Nilai Akhir sempurna 100', 'bobot' => 4],
            ['kriteria_id' => 4, 'nilai' => '90 - 100', 'keterangan' => 'Nilai Akhir rata-rata lebih dari 90', 'bobot' => 3],
            ['kriteria_id' => 4, 'nilai' => '80 - 90', 'keterangan' => 'Nilai Akhir rata-rata antara 80 hingga 90', 'bobot' => 2],
            ['kriteria_id' => 4, 'nilai' => '70 - 80', 'keterangan' => 'Nilai Akhir rata-rata antara 70 hingga 80', 'bobot' => 1],
            ['kriteria_id' => 4, 'nilai' => '60 - 70', 'keterangan' => 'Nilai Akhir rata-rata antara 60 hingga 70', 'bobot' => 1],
            ['kriteria_id' => 4, 'nilai' => '50 - 60', 'keterangan' => 'Nilai Akhir rata-rata antara 50 hingga 60', 'bobot' => 1],
        ]);

        // Usia Ortu
        DB::table('usia_ortus')->insert([
            ['kriteria_id' => 5, 'nama' => '81 Tahun ke atas', 'keterangan' => 'Usia orang tua lebih dari 80 tahun', 'bobot' => 1],
            ['kriteria_id' => 5, 'nama' => 'Lebih dari 80 Tahun', 'keterangan' => 'Usia orang tua lebih dari 80 tahun', 'bobot' => 1],
            ['kriteria_id' => 5, 'nama' => '61 - 80 Tahun', 'keterangan' => 'Usia orang tua antara 61 hingga 80 tahun', 'bobot' => 1],
            ['kriteria_id' => 5, 'nama' => '41 - 60 Tahun', 'keterangan' => 'Usia orang tua antara 41 hingga 60 tahun', 'bobot' => 2],
            ['kriteria_id' => 5, 'nama' => '20 - 40 Tahun', 'keterangan' => 'Usia orang tua antara 20 hingga 40 tahun', 'bobot' => 3],
            ['kriteria_id' => 5, 'nama' => '18 - 20 Tahun', 'keterangan' => 'Usia orang tua antara 18 hingga 20 tahun', 'bobot' => 2],
        ]);

        $data = [
            [
                'user_id' => null, // Adjust user_id if necessary
                'nama' => 'Abdiel Maqshud Ibnu H',
                'asal_sekolah' => 'SMA 1 Jakarta',
                'nomor_induk' => '001',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2005-05-10',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'alamat' => 'Jl. Mawar No. 1',
                'no_hp' => '081234567890',
                'Pekerjaan_Ortu_id' => 4, // Corresponding value for C1 = 4
                'Tanggungan_Ortu_id' => 3, // Corresponding value for C2 = 3
                'Penghasilan_Ortu_id' => 5, // Corresponding value for C3 = 5
                'Nilai_id' => 3, // Corresponding value for C4 = 3
                'Usia_Orangtua_id' => 2, // Corresponding value for C5 = 2
                'keterangan' => 'Calon penerima beasiswa'
            ],
            [
                'user_id' => null,
                'nama' => 'Abel Arya Pratama',
                'asal_sekolah' => 'SMA 2 Jakarta',
                'nomor_induk' => '002',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-02-12',
                'jenis_kelamin' => 'L',
                'agama' => 'Kristen',
                'alamat' => 'Jl. Melati No. 10',
                'no_hp' => '081345678901',
                'Pekerjaan_Ortu_id' => 3, // Corresponding value for C1 = 3
                'Tanggungan_Ortu_id' => 3, // Corresponding value for C2 = 3
                'Penghasilan_Ortu_id' => 4, // Corresponding value for C3 = 4
                'Nilai_id' => 4, // Corresponding value for C4 = 4
                'Usia_Orangtua_id' => 2, // Corresponding value for C5 = 2
                'keterangan' => 'Calon penerima beasiswa'
            ],
            [
                'user_id' => null,
                'nama' => 'Iresa Aulia Zen',
                'asal_sekolah' => 'SMA 3 Bandung',
                'nomor_induk' => '003',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2004-08-14',
                'jenis_kelamin' => 'P',
                'agama' => 'Islam',
                'alamat' => 'Jl. Tulip No. 15',
                'no_hp' => '081456789012',
                'Pekerjaan_Ortu_id' => 1, // Corresponding value for C1 = 1
                'Tanggungan_Ortu_id' => 5, // Corresponding value for C2 = 5
                'Penghasilan_Ortu_id' => 1, // Corresponding value for C3 = 1
                'Nilai_id' => 3, // Corresponding value for C4 = 3
                'Usia_Orangtua_id' => 4, // Corresponding value for C5 = 4
                'keterangan' => 'Calon penerima beasiswa'
            ],
            [
                'user_id' => null,
                'nama' => 'Ibnu Rafiq',
                'asal_sekolah' => 'SMA 4 Yogyakarta',
                'nomor_induk' => '004',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2005-12-20',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'alamat' => 'Jl. Anggrek No. 5',
                'no_hp' => '081567890123',
                'Pekerjaan_Ortu_id' => 4, // Corresponding value for C1 = 4
                'Tanggungan_Ortu_id' => 2, // Corresponding value for C2 = 2
                'Penghasilan_Ortu_id' => 5, // Corresponding value for C3 = 5
                'Nilai_id' => 3, // Corresponding value for C4 = 3
                'Usia_Orangtua_id' => 2, // Corresponding value for C5 = 2
                'keterangan' => 'Calon penerima beasiswa'
            ],
            [
                'user_id' => null,
                'nama' => 'M.Zikra Pratama Putra',
                'asal_sekolah' => 'SMA 5 Malang',
                'nomor_induk' => '005',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2005-11-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'alamat' => 'Jl. Kenanga No. 3',
                'no_hp' => '081678901234',
                'Pekerjaan_Ortu_id' => 3, // Corresponding value for C1 = 3
                'Tanggungan_Ortu_id' => 2, // Corresponding value for C2 = 2
                'Penghasilan_Ortu_id' => 3, // Corresponding value for C3 = 3
                'Nilai_id' => 3, // Corresponding value for C4 = 3
                'Usia_Orangtua_id' => 2, // Corresponding value for C5 = 2
                'keterangan' => 'Calon penerima beasiswa'
            ],
            [
                'user_id' => null,
                'nama' => 'Ririn Dwi Yulianti',
                'asal_sekolah' => 'SMA 6 Semarang',
                'nomor_induk' => '006',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2006-04-22',
                'jenis_kelamin' => 'P',
                'agama' => 'Islam',
                'alamat' => 'Jl. Seruni No. 8',
                'no_hp' => '081789012345',
                'Pekerjaan_Ortu_id' => 2, // Corresponding value for C1 = 2
                'Tanggungan_Ortu_id' => 2, // Corresponding value for C2 = 2
                'Penghasilan_Ortu_id' => 1, // Corresponding value for C3 = 1
                'Nilai_id' => 2, // Corresponding value for C4 = 2
                'Usia_Orangtua_id' => 1, // Corresponding value for C5 = 1
                'keterangan' => 'Calon penerima beasiswa'
            ]
        ];

        foreach ($data as $item) {
            Beasiswa::create($item);
        }
    }
}
