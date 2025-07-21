<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_Kandidat extends Model
{
    protected $primaryKey = 'id_kandidat';
    protected $table      = 'kandidat';
    public $timestamps    = true;

    protected $fillable = ['visi', 'misi', 'no_kandidat', 'foto_paslon', 'status_kepesertaan'];

    public function detail()
    {
        return $this->hasMany(m_DetailKandidat::class, 'id_kandidat');
    }

    public function rekapSuaras()
    {
        return $this->hasMany(m_RekapSuara::class, 'id_kandidat');
    }
}
