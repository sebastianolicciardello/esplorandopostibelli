<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $hidden = ['password'];
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
    ];

    public function suggestplaces()
    {
        return $this->hasMany('SuggestPlace');
    }

    public function messages()
    {
        return $this->hasMany('Message');
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
