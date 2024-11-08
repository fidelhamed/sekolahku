<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataMuridsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $jenjang;

    public function __construct($jenjang)
    {
        $this->jenjang = $jenjang;
    }

    public function collection()
    {
        return User::with('muridDetail','dataOrtu')
            ->whereHas('muridDetail', function($query) {
                $query->where('jenjang', $this->jenjang);
            })
            ->get()
            ->map(function($murid){
                return [
                    // 'ID' => $murid->id,
                    'User ID' => $murid->muridDetail ? $murid->muridDetail->user_id : null,
                    'No Registrasi' => $murid->muridDetail ? $murid->muridDetail->noreg : null,
                    'Nama' => $murid->name,
                    'NIK' => $murid->muridDetail ? "'" . $murid->muridDetail->nik : null,
                    'NISN' => $murid->muridDetail ? $murid->muridDetail->nisn : null,
                    'Jalur' => $murid->muridDetail ? $murid->muridDetail->jalur : null,
                    'Jenjang' => $murid->muridDetail ? $murid->muridDetail->jenjang : null,
                    'Nama Panggilan' => $murid->muridDetail ? $murid->muridDetail->nama_panggilan : null,
                    'Jenis Kelamin' => $murid->muridDetail ? $murid->muridDetail->jenis_kelamin : null,
                    'Tempat Lahir' => $murid->muridDetail ? $murid->muridDetail->tempat_lahir : null,
                    'Tanggal Lahir' => $murid->muridDetail ? $murid->muridDetail->tgl_lahir : null,
                    'Anak Ke' => $murid->muridDetail ? $murid->muridDetail->anak_ke : null,
                    'Jumlah Saudara Kandung' => $murid->muridDetail ? $murid->muridDetail->jumlah_saudara : null,
                    'Alamat' => $murid->muridDetail ? $murid->muridDetail->alamat : null,
                    'Kelurahan' => $murid->muridDetail ? $murid->muridDetail->kelurahan : null,
                    'Kecamatan' => $murid->muridDetail ? $murid->muridDetail->kecamatan : null,
                    'Kabupaten' => $murid->muridDetail ? $murid->muridDetail->kabupaten : null,
                    'Provinsi' => $murid->muridDetail ? $murid->muridDetail->provinsi : null,
                    'Kode Pos' => $murid->muridDetail ? $murid->muridDetail->kode_pos : null,
                    'Telepon' => $murid->muridDetail ? $murid->muridDetail->telp : null,
                    'WhatsApp' => $murid->muridDetail ? $murid->muridDetail->whatsapp : null,
                    'Nama Sekolah Asal' => $murid->muridDetail ? $murid->muridDetail->nama_sekolah_asal : null,
                    'NPSN Sekolah Asal' => $murid->muridDetail ? $murid->muridDetail->npsn_sekolah_asal : null,
                    'Kecamatan Sekolah Asal' => $murid->muridDetail ? $murid->muridDetail->kecamatan_sekolah_asal : null,
                    'Kabupaten Sekolah Asal' => $murid->muridDetail ? $murid->muridDetail->kabupaten_sekolah_asal : null,
                    'Lingkar Kepala' => $murid->muridDetail ? $murid->muridDetail->lingkar_kepala : null,
                    'Tinggi Badan' => $murid->muridDetail ? $murid->muridDetail->tinggi_badan : null,
                    'Berat Badan' => $murid->muridDetail ? $murid->muridDetail->berat_badan : null,
                    'Golongan Darah' => $murid->muridDetail ? $murid->muridDetail->gol_darah : null,
                    'Sakit' => $murid->muridDetail ? $murid->muridDetail->sakit : null,
                    'Prestasi' => $murid->muridDetail ? $murid->muridDetail->prestasi : null,
                    'Proses' => $murid->muridDetail ? $murid->muridDetail->proses : null,
                    'Nama Ayah' => $murid->dataOrtu ? $murid->dataOrtu->nama_ayah : null,
                    'NIK Ayah' => $murid->dataOrtu ? "'" . $murid->dataOrtu->nik_ayah : null,
                    'Pendidikan Ayah' => $murid->dataOrtu ? $murid->dataOrtu->pendidikan_ayah : null,
                    'No Telp Ayah' => $murid->dataOrtu ? $murid->dataOrtu->telp_ayah : null,
                    'Pekerjaan Ayah' => $murid->dataOrtu ? $murid->dataOrtu->pekerjaan_ayah : null,
                    'Penghasilan Ayah' => $murid->dataOrtu ? $murid->dataOrtu->penghasilan_ayah : null,
                    'Alamat Ayah' => $murid->dataOrtu ? $murid->dataOrtu->alamat_ayah : null,
                    'Nama Ibu' => $murid->dataOrtu ? $murid->dataOrtu->nama_ibu : null,
                    'NIK Ibu' => $murid->dataOrtu ? "'" . $murid->dataOrtu->nik_ibu : null,
                    'Pendidikan Ibu' => $murid->dataOrtu ? $murid->dataOrtu->pendidikan_ibu : null,
                    'No Telp Ibu' => $murid->dataOrtu ? $murid->dataOrtu->telp_ibu : null,
                    'Pekerjaan Ibu' => $murid->dataOrtu ? $murid->dataOrtu->pekerjaan_ibu : null,
                    'Penghasilan Ibu' => $murid->dataOrtu ? $murid->dataOrtu->penghasilan_ibu : null,
                    'Alamat Ibu' => $murid->dataOrtu ? $murid->dataOrtu->alamat_ibu : null,
                    'Nama Wali' => $murid->dataOrtu ? $murid->dataOrtu->nama_wali : null,
                    'No Telp Wali' => $murid->dataOrtu ? $murid->dataOrtu->telp_wali : null,
                    'Alamat Wali' => $murid->dataOrtu ? $murid->dataOrtu->alamat_wali : null,
                    'Approved By' => $murid->approved_by,
                    'Created At' => $murid->created_at,
                    'Updated At' => $murid->updated_at,
                ];
            });
    }
    
    public function headings(): array
    {
        return [
            // 'ID',
            'User ID',
            'No Registrasi',
            'Nama',
            'NIK',
            'NISN',
            'Jalur',
            'Jenjang',
            'Nama Panggilan',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Anak Ke',
            'Jumlah Saudara Kandung',
            'Alamat',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Kode Pos',
            'Telepon',
            'WhatsApp',
            'Nama Sekolah Asal',
            'NPSN Sekolah Asal',
            'Kecamatan Sekolah Asal',
            'Kabupaten Sekolah Asal',
            'Lingkar Kepala',
            'Tinggi Badan',
            'Berat Badan',
            'Golongan Darah',
            'Sakit',
            'Prestasi',
            'Proses',
            'Nama Ayah',
            'NIK Ayah',
            'Pendidikan Ayah',
            'No Telp Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',
            'Alamat Ayah',
            'Nama Ibu',
            'NIK Ibu',
            'Pendidikan Ibu',
            'No Telp Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
            'Alamat Ibu',
            'Nama Wali',
            'No Telp Wali',
            'Alamat Wali',
            'Approved By',
            'Created At',
            'Updated At',
        ];
    }
}
