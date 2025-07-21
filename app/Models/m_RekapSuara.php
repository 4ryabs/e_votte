<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_RekapSuara extends Model
{
    protected $primaryKey = 'id_rekap';
    protected $table      = 'rekap_suara';
    public $timestamps    = true;

    public function kandidat()
    {
        return $this->belongsTo(m_Kandidat::class, 'id_kandidat');
    }
}
