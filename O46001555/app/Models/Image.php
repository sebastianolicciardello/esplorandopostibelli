<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'place',
        'url' 
    ];

    public function places()
    {
        return $this->belongsTo('Place');
    }
}

?>