<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_DataPemilih extends Model
{
    protected $table      = 'users';
    protected $fillable   = ['nim', 'name', 'prodi', 'foto', 'validasi', 'email', 'password', 'role'];
    protected $primaryKey = 'id';
    public $timestamps    = true;
}
