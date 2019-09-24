<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    protected $fillable = ['predicateur','theme','user_id','recorder_id', 'nbre', 'date_livraison', 'date_culte'];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

}