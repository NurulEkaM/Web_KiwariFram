<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan baris ini
use App\Models\Gaji;

class Kredit extends Model
{
    use HasFactory; 
    
    protected $table = 'kredit'; 
    protected $primaryKey = 'id_kredit';

    protected $fillable = [
        'nama',
        'tanggal',
        'id_gaji',
        'jenis_pengeluaran',
        'saldo_kredit',
        'keterangan',
        'status',
    ];

    public function gaji() {
        return $this->belongsTo(Gaji::class, 'id_gaji', 'id_gaji');
    }
}
