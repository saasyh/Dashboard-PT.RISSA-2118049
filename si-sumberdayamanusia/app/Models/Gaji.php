<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'tb_gaji';
    protected $primaryKey = 'id_gaji';
    protected $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id_gaji',
        'id_karyawan',
        'gaji_pokok',
        'potongan_gaji',
        'lembur',
        'jumlah',
        'tanggal'

    ];
    use HasFactory;
}
