<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MajorSeeder extends Seeder
{
  public function run()
  {

    $majors_teknik = [
      // Program Diploma (D3)
      ['name' => 'Teknik Sipil', 'faculty_id' => 2, 'degree_id' => 1],
      ['name' => 'Teknik Listrik', 'faculty_id' => 2, 'degree_id' => 1],
      ['name' => 'Teknik Mesin', 'faculty_id' => 2, 'degree_id' => 1],

      // Program Sarjana (S1)
      ['name' => 'Teknik Mesin', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Pertambangan', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Arsitektur', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Geologi', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Elektro', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Komputer', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Sipil', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Geofisika', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Perencanaan Wilayah dan Kota', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Kimia', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Teknik Industri', 'faculty_id' => 2, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Magister Teknik Kimia', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Magister Teknik Elektro', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Magister Teknik Sipil', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Magister Teknik Industri', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Magister Teknik Mesin', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Magister Arsitektur', 'faculty_id' => 2, 'degree_id' => 3],

      // Program Doktoral (S3)
      ['name' => 'Doktor Ilmu Teknik', 'faculty_id' => 2, 'degree_id' => 4],
    ];

    $faculty_id_keguruan = 5;
    $majors_keguruan = [
      // Program Profesi
      ['name' => 'Pendidikan Profesi Guru', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 5],

      // Program Sarjana (S1)
      ['name' => 'Pendidikan Jasmani, Kesehatan, dan Rekreasi', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Ekonomi', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Guru Pendidikan Anak Usia Dini', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Sejarah', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Guru Sekolah Dasar', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Seni, Drama, Tari, dan Musik', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Bahasa Inggris', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Bahasa Indonesia', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Kewarganegaraan', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Fisika', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Kimia', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Biologi', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Kesejahteraan Keluarga', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Matematika', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Pendidikan Geografi', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],
      ['name' => 'Bimbingan dan Konseling', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Pendidikan Olahraga', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 3],
      ['name' => 'Pendidikan Bahasa Indonesia', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 3],
      ['name' => 'Pendidikan Bahasa Inggris', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 3],
      ['name' => 'Pendidikan Biologi', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 3],

      // Program Doktoral (S3)
      ['name' => 'Pendidikan IPS', 'faculty_id' => $faculty_id_keguruan, 'degree_id' => 4],
    ];

    $faculty_id_pertanian = 6;
    $majors_pertanian = [
      // Program Diploma (D3)
      ['name' => 'Manajemen Agribisnis', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 1],
      ['name' => 'Budidaya Peternakan', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 1],

      // Program Sarjana (S1)
      ['name' => 'Agribisnis', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Proteksi Tanaman', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Kehutanan', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Peternakan', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Agroteknologi', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Teknik Pertanian', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Teknologi Hasil Pertanian', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],
      ['name' => 'Ilmu Tanah', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Ilmu Peternakan', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 3],
      ['name' => 'Agribisnis', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 3],
      ['name' => 'Teknologi Industri Pertanian', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 3],
      ['name' => 'Agroekoteknologi', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 3],

      // Program Doktoral (S3)
      ['name' => 'Ilmu Pertanian', 'faculty_id' => $faculty_id_pertanian, 'degree_id' => 4],
    ];

    $faculty_id_kedokteran = 7;
    $majors_kedokteran = [
      // Program Profesi
      ['name' => 'Profesi Dokter', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 5],

      // Program Sarjana (S1)
      ['name' => 'Pendidikan Dokter', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 2],
      ['name' => 'Psikologi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Kesehatan Masyarakat', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 3],
      ['name' => 'Sains Biomedis', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 3],

      // Program Doktoral (S3)
      ['name' => 'Ilmu Kedokteran', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 4],

      // Program Spesialis
      ['name' => 'Pulmonologi dan Kedokteran Respirasi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Telinga, Hidung, Tenggorok, Kepala dan Leher (THT-KL)', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Ilmu Kesehatan Anak', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Neurologi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Ilmu Penyakit Dalam', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Ilmu Bedah', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Anestesiologi dan Reanimasi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],

      // Spesialis
      ['name' => 'Ilmu Obstetri dan Ginekologi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Jantung dan Pembuluh Darah', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
      ['name' => 'Bedah Plastik dan Rekonstruksi', 'faculty_id' => $faculty_id_kedokteran, 'degree_id' => 6],
    ];

    $faculty_id_mipa = 8;
    $majors_mipa = [
      // Program Diploma (D3)
      ['name' => 'Teknik Elektronika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 1],
      ['name' => 'Manajemen Informatika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 1],

      // Program Sarjana (S1)
      ['name' => 'Biologi', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Fisika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Statistika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Matematika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Farmasi', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Informatika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],
      ['name' => 'Kimia', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Fisika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 3],
      ['name' => 'Kimia', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 3],
      ['name' => 'Biologi', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 3],
      ['name' => 'Matematika', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 3],
      ['name' => 'Kecerdasan Buatan', 'faculty_id' => $faculty_id_mipa, 'degree_id' => 3],
    ];

    $faculty_id_fisip = 9;
    $majors_fisip = [
      // Program Sarjana (S1)
      ['name' => 'Ilmu Politik', 'faculty_id' => $faculty_id_fisip, 'degree_id' => 2],
      ['name' => 'Ilmu Komunikasi', 'faculty_id' => $faculty_id_fisip, 'degree_id' => 2],
      ['name' => 'Ilmu Pemerintahan', 'faculty_id' => $faculty_id_fisip, 'degree_id' => 2],
      ['name' => 'Sosiologi', 'faculty_id' => $faculty_id_fisip, 'degree_id' => 2],
    ];

    $faculty_id_keperawatan = 10;
    $majors_keperawatan = [
      // Program Profesi
      ['name' => 'Profesi Ners', 'faculty_id' => $faculty_id_keperawatan, 'degree_id' => 1],

      // Program Sarjana (S1)
      ['name' => 'Ilmu Keperawatan', 'faculty_id' => $faculty_id_keperawatan, 'degree_id' => 2],

      // Program Master (S2)
      ['name' => 'Keperawatan', 'faculty_id' => $faculty_id_keperawatan, 'degree_id' => 3],
    ];

    $_majors = [
      // Fakultas Ekonomi dan Bisnis
      ['name' => 'Pemasaran', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Perpajakan', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Akuntansi', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Manajemen Perusahaan', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Sekretaris', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Keuangan dan Perbankan', 'faculty_id' => 1, 'degree_id' => 1],
      ['name' => 'Ekonomi Manajemen', 'faculty_id' => 1, 'degree_id' => 2],
      ['name' => 'Ekonomi Akuntansi', 'faculty_id' => 1, 'degree_id' => 2],
      ['name' => 'Ekonomi Pembangunan', 'faculty_id' => 1, 'degree_id' => 2],
      ['name' => 'Ekonomi Islam', 'faculty_id' => 1, 'degree_id' => 2],
      ['name' => 'Kelas Internasional', 'faculty_id' => 1, 'degree_id' => 2],
      ['name' => 'Magister Manajemen', 'faculty_id' => 1, 'degree_id' => 3],
      ['name' => 'Magister Akuntansi', 'faculty_id' => 1, 'degree_id' => 3],
      ['name' => 'Magister Ilmu Ekonomi', 'faculty_id' => 1, 'degree_id' => 3],
      ['name' => 'Doktor Ilmu Manajemen', 'faculty_id' => 1, 'degree_id' => 4],
      ['name' => 'Doktor Ilmu Ekonomi', 'faculty_id' => 1, 'degree_id' => 4],


      // Fakultas Kedokteran Hewan
      ['name' => 'Kesehatan Hewan', 'faculty_id' => 2, 'degree_id' => 1],
      ['name' => 'Pendidikan Dokter Hewan', 'faculty_id' => 2, 'degree_id' => 2],
      ['name' => 'Magister Kesehatan Masyarakat Veteriner', 'faculty_id' => 2, 'degree_id' => 3],
      ['name' => 'Profesi Pendidikan Dokter Hewan', 'faculty_id' => 2, 'degree_id' => 5],

      // Fakultas hukum
      ['name' => 'Ilmu Hukum', 'faculty_id' => 3, 'degree_id' => 2],
      ['name' => 'Magister Ilmu Hukum', 'faculty_id' => 3, 'degree_id' => 3],
      ['name' => 'Magister Kenotariatan', 'faculty_id' => 3, 'degree_id' => 3],
      ['name' => 'Doktor Ilmu Hukum', 'faculty_id' => 3, 'degree_id' => 4],

      // Fakultas Teknik
      ...$majors_teknik,

      // Fakultas Keguruan dan Ilmu Pendidikan
      ...$majors_keguruan,

      // Fakultas Pertanian
      ...$majors_pertanian,

      // Fakultas Kedokteran
      ...$majors_kedokteran,

      // Fakultas Matematika dan Ilmu Pengetahuan Alam
      ...$majors_mipa,

      // Fakultas Ilmu Sosial dan Ilmu Politik
      ...$majors_fisip,

      // Fakultas Keperawatan
      ...$majors_keperawatan
    ];


    $majors = [];
    foreach ($_majors as $key => $_major) {
      $major = [];
      $major['name'] = $_major['name'];
      $major['faculty_id'] = $_major['faculty_id'];
      $major['degree_id'] = $_major['degree_id'];
      $major['created_at'] = Time::now();
      $major['updated_at'] = Time::now();
      $majors[] = $major;
    }

    $this->db->table('majors')->insertBatch($majors);
  }
}
