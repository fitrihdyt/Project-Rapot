<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaNilai extends Model
{
    protected $table = 'siswa_nilai';

    protected $fillable = ['siswa_id', 'nilai_id', 'relation_id', 'relation_type'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }
}
?>