<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_DetailKandidat extends Model
{
    protected $table   = 'detail_kandidat';
    public $timestamps = true;

    protected $fillable = ['id_kandidat', 'nim', 'name', 'jabatan'];

    public function kandidat()
    {
        return $this->belongsTo(m_Kandidat::class, 'id_kandidat');
    }
}
