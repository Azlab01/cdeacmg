<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Http\Requests\UserRequest;
use App\repositories\CommandeRepository;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Commande;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    protected $commandeRepository;
    protected $nbrPerPage = 10;

    public function __construct(CommandeRepository $commandeRepository)
    {
        $this->middleware('auth');
        $this->commandeRepository = $commandeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = $this->commandeRepository->getPaginate($this->nbrPerPage);
        $links = $commandes->render();
        $users = DB::table('users')->get();
        
        return view('home', compact('commandes', 'links', 'users'));

    }


    public function store(CommandeRequest $request)
    {
        $request->date_livraison = '';
        $inputs = array_merge($request->all());
        $this->commandeRepository->store($inputs);

        //return redirect(route('home'));
    }


    public function destroy($id)
    {
        $this->commandeRepository->destroy($id);
        return redirect()->back();
    }
    

    public function addUser(UserRequest $request)
    {
        User::create([
            'name' => 'none',
            'email' => $request->numero.'@eacmg.ga',
            'numero' => $request->numero,
            'username' => $request->name,
            'password' => bcrypt('0000000'),
        ]);

    }

    public function updateCommande($id){
         $this->commandeRepository->livrer($id);
         return redirect()->back();
    }

    public function deleteCommande($id){
         $this->commandeRepository->delete($id);
         return redirect()->back();
    }
}
