<?php

namespace App\Repositories;

use App\Commande;
use DB;
use Carbon\Carbon;
class CommandeRepository
{

    protected $commande;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    public function getPaginate($n)
    {
        return DB::table('commandes as c')
            ->join('users AS r', 'r.id',   '=', 'c.user_id')
            ->join('users AS re', 're.id', '=', 'c.recorder_id')
            ->select('r.username as receiver', 're.username as recorder', 'c.date_culte as date_culte', 'c.id as id', 'c.predicateur as predicateur', 'c.theme as theme', 'c.created_at as created_at', 'c.date_livraison as date_livraison', 'c.nbre as nbre', 'r.numero as numero')
        ->paginate($n);
    }

    public function store($inputs)
    {
        $this->commande->create($inputs);
    }

    public function destroy($id)
    {
        $this->commande->findOrFail($id)->delete();
    }

    public function livrer($id)
    {
        $date = date('Y-m-d');
        DB::table('commandes')
            ->where('id', $id)
            ->update(['date_livraison' => $date]);
    }

    public function delete($id)
    {
        DB::table('commandes')->where('id', '=', $id)->delete();
    }
}