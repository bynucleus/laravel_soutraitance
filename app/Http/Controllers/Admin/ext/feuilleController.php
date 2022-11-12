<?php

namespace App\Http\Controllers\Admin\ext;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class feuilleController extends Controller
{
    /*
     * liste des commandes
     */
    public function index(Request $request)
    {
        // $status = $_GET['status']??'null';
        // $commande = Commande::with(['client', 'adresse.commune', 'detail.taille', 'detail.couleur']);
        // $commandes = Commande::where('deleted_at',null);
        // if ($status !== 'null') {
        //     $commandes= Commande::where('deleted_at',null)->where('status', '=', (int)$status)->paginate(10);
        // }
        // else{

        //     $commandes= Commande::where('deleted_at',null)->paginate(10);
        // }
        // dd($commandes);
        $feuilles = \DB::table("feuille")->get();

        return view("admin_ext.feuille", compact('feuilles'));
    }

    public function show($mission)
    {
        $mission = Mission::where('id', $mission)
            ->first();
        return view("admin_ext.detail_feuille", compact('mission'));
    }
    public function semaine($mission)
    {
        /* detail d'une commande */
        // dd($commande);

        $mission = Mission::where('id', $mission)
            ->first();
        return view("admin_ext.semaine_feuille", compact('mission'));
    }
    public function delete(Commande $commande)
    {

        $commande->update(['deleted_at' => now()]);
        return redirect()->route("commandes");
    }
    public function save_feuille(Request $request)
    {

        $debut = $request->debut;
        $fin = $request->fin;
        $id_mission = $request->id_mission;

        $code_lundi1 = $request->code_lundi1;
        $hre_lundi1 = $request->hre_lundi1;

        $code_mardi1 = $request->code_mardi1;
        $hre_mardi1 = $request->hre_mardi1;

        $code_mercredi1 = $request->code_mercredi1;
        $hre_mercredi1 = $request->hre_mercredi1;

        $code_jeudi1 = $request->code_jeudi1;
        $hre_jeudi1 = $request->hre_jeudi1;

        $code_vendredi1 = $request->code_vendredi1;
        $hre_vendredi1 = $request->hre_vendredi1;

        $code_samedi1 = $request->code_samedi1;
        $hre_samedi1 = $request->hre_samedi1;

        $code_dimanche1 = $request->code_dimanche1;
        $hre_dimanche1 = $request->hre_dimanche1;

        $ac = \DB::table('feuille_temps')
            ->where('date_debut', $debut)
            ->first();
        // dd($ac==null);
        if($ac == null){
            $id=\DB::table('feuille_temps')
            ->insertGetId([
                "id_mission" => $id_mission,
                "date_debut" => $debut,
                "date_fin" => $fin,
                "etat" => "enregistrer",
                "created_at"=> now()
            ]);
            
            \DB::table('enregistrement')
            ->insert([
                "id_feuille_temps" => $id,
            ]);
            dd($request->input());
        }
    }
}
