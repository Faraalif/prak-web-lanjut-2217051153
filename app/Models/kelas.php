<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelas';

    /**
     * Mendapatkan semua data kelas.
     */
    public function getKelas()
    {
        return $this->all();
    }

    /**
     * Relasi one-to-many dengan model UserModel.
     */
    public function user()
    {
        return $this->hasMany(UserModel::class, 'kelas_id');
    }
}