<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'place',
        'user' 
    ];

    public function places()
    {
        return $this->belongsTo('Place');
    }

    public function users()
    {
        return $this->belongsTo('User');
    }
}

?>