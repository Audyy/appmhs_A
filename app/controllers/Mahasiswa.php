<?php

class Mahasiswa extends Controller
{
    public function __construct()
    {
        // Tambahkan logika autentikasi atau filter sesuai kebutuhan
        // Contoh:
        // if ($_SESSION['session_login'] != 'sudah_login') {
        //     Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
        //     header('location: ' . base_url . '/login');
        //     exit;
        // }
    }

    public function index()
    {
        // Implementasikan logika untuk menampilkan data mahasiswa
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // Implementasikan logika untuk menampilkan halaman tambah mahasiswa
        $data['title'] = 'Tambah Mahasiswa';
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/create', $data);
        $this->view('templates/footer');
    }

    public function simpanMahasiswa()
    {
        // Implementasikan logika untuk menyimpan data mahasiswa
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function edit($id)
    {
        // Implementasikan logika untuk menampilkan halaman edit mahasiswa
        $data['title'] = 'Edit Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/edit', $data);
        $this->view('templates/footer');
    }

    public function updateMahasiswa()
    {
        // Implementasikan logika untuk mengupdate data mahasiswa
        if ($this->model('MahasiswaModel')->updateDataMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('MahasiswaModel')->deleteMahasiswa($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->cariMahasiswa();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('mahasiswa/lihatlaporan', $data);
    }


    public function laporan()
    {
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $pdf = new FPDF('p', 'mm', 'A4');

        // membuat halaman baru 
        $pdf->AddPage();
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string  
        $pdf->Cell(190, 7, 'LAPORAN MAHASISWA', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'NAMA', 1);
        $pdf->Cell(30, 6, 'ALAMAT', 1);
        $pdf->Cell(40, 6, 'TANGGAL LAHIR', 1);
        $pdf->Cell(30, 6, 'JENIS KELAMIN', 1);
        $pdf->Cell(40, 6, 'KONTAK DARURAT', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['mahasiswa'] as $row) {
            $pdf->Cell(40, 6, $row['Nama'], 1);
            $pdf->Cell(30, 6, $row['Alamat'], 1);
            $pdf->Cell(40, 6, $row['TanggalLahir'], 1);
            $pdf->Cell(30, 6, $row['JenisKelamin'], 1);
            $pdf->Cell(40, 6, $row['KontakDarurat'], 1);
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Mahasiswa.pdf', true);
    }
}
