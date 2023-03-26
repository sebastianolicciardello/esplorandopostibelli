<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'primaryImg' ,
        'routeImg',
        'routeUrl',
        'locality',
        'difficulty' 
    ];

    public function images()
    {
        return $this->hasMany('Image');
    }

    public function favorites()
    {
        return $this->hasMany('Favorite');
    }

    public function ratings()
    {
        return $this->hasMany('Rating');
    }

}

?>