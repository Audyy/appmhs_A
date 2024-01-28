<?php

class Ruang extends Controller
{
    public function __construct()
    {
        // Pastikan aturan autentikasi atau kondisi lain sesuai kebutuhan
    }

    public function index()
    {
        $data['title'] = 'Data Ruang';
        $data['ruang'] = $this->model('RuangModel')->getAllRuang();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ruang/index', $data); // Sesuaikan dengan struktur folder dan file view yang Anda gunakan
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Ruang';
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        // Logic untuk menampilkan form tambah ruang atau melakukan proses tambah
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ruang/create', $data); // Sesuaikan dengan struktur folder dan file view yang Anda gunakan
        $this->view('templates/footer');
    }

    public function simpanRuang()
    {
        // Implementasikan logika untuk menyimpan data ruang
        if ($this->model('RuangModel')->tambahRuang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/ruang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/ruang');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Ruang';
        $data['ruang'] = $this->model('RuangModel')->getRuangById($id);
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        // Logic untuk menampilkan form edit ruang atau melakukan proses edit
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ruang/edit', $data); // Sesuaikan dengan struktur folder dan file view yang Anda gunakan
        $this->view('templates/footer');
    }

    public function updateRuang()
    {
        // Implementasikan logika untuk mengupdate data ruang
        if ($this->model('RuangModel')->updateDataRuang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/ruang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/ruang');
            exit;
        }
    }

    public function hapus($id)
    {
        // Logic untuk menghapus data ruang berdasarkan ID
        if ($this->model('RuangModel')->deleteRuang($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
        }
        header('location: ' . base_url . '/ruang');
        exit;
    }

    public function cari()
    {
        $data['title'] = 'Data Ruang';
        $data['ruang'] = $this->model('RuangModel')->cariRuang();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('ruang/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Ruang';
        $data['ruang'] = $this->model('RuangModel')->getAllRuang();
        $this->view('ruang/lihatlaporan', $data);
    }

    public function laporan()
    {
        $data['title'] = 'Laporan Data Ruang';
        $data['ruang'] = $this->model('RuangModel')->getAllRuang();

        // Buat objek FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Tambahkan konten laporan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Laporan Data Ruang', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(15, 10, 'No', 1);
        $pdf->Cell(30, 10, 'Kode Ruang', 1);
        $pdf->Cell(20, 10, 'Gedung', 1);
        $pdf->Cell(20, 10, 'Lantai', 1);
        $pdf->Cell(40, 10, 'Program Studi', 1);
        $pdf->Cell(40, 10, 'Kelas', 1);
        $pdf->Ln();

        $no = 1;
        foreach ($data['ruang'] as $ruang) {
            $pdf->Cell(15, 10, $no++, 1);
            $pdf->Cell(30, 10, $ruang['KodeRuang'], 1);
            $pdf->Cell(20, 10, $ruang['Gedung'], 1);
            $pdf->Cell(20, 10, $ruang['Lantai'], 1);
            $pdf->Cell(40, 10, $ruang['NamaProgram'], 1);
            $pdf->Cell(40, 10, $ruang['Kelas'], 1);
            $pdf->Ln();
        }

        // Output PDF ke browser atau simpan ke file
        $pdf->Output();
    }
}
