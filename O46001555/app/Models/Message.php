<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user',
        'text',
        'date'
    ];

    public function users()
    {
        return $this->belongsTo('User');
    }
}

?>