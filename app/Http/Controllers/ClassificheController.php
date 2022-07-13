<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;
use App\Models\User;

class ClassificheController extends Controller
{
    public function index(){

        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));

        return view('classifiche')->with("user", $user);
    }
    public function show($type,$value){
        switch($type) {
            case 'piloti': return $this->piloti($value); break;
            case 'costruttori': return $this->costruttori($value); break;
            default: break;
        }
    }
    function piloti($value){
        
        $json = Http::get('http://ergast.com/api/f1/'.$value.'/driverstandings.json');
        if ($json->failed()) abort(500);
    
        $newJson = array();
        
        for ($i = 0; $i < $json['MRData']['total']; $i++) {
            $newJson[] = array(
                                'type'=>'pilot',
                                'length'=>$json['MRData']['total'],
                                'position' => $json['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'][$i]['position'],
                                'pilot' => $json['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'][$i]['Driver']['driverId'],
                                'scuderia'=>$json['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'][$i]['Constructors'][0]['constructorId'],
                                'points' => $json['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'][$i]['points'],
                                'wins' => $json['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'][$i]['wins']);
        }
    
        return response()->json($newJson);
    }
    
    function costruttori($value){
        $json = Http::get('http://ergast.com/api/f1/'.$value.'/constructorstandings.json');
        if ($json->failed()) abort(500);
    
        $newJson = array();
    
        for ($i = 0; $i < $json['MRData']['total']; $i++) {
            $newJson[] = array(
                                'type'=>'constructor',
                                'length'=>$json['MRData']['total'],
                                'position' => $json['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'][$i]['position'],
                                'constructor' => $json['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'][$i]['Constructor']['constructorId'],
                                'points' => $json['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'][$i]['points'],
                                'wins' => $json['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'][$i]['wins']);
        }
    
        return response()->json($newJson);
    }
}
