<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;
use App\Models\User;

class RaceController extends Controller
{
    
function last_race(){
     $curl = curl_init();
 
     curl_setopt_array($curl, [
         CURLOPT_URL => "https://api-formula-1.p.rapidapi.com/races?type=race&timezone=Europe%2FRome&last=1",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => [
             "X-RapidAPI-Host: api-formula-1.p.rapidapi.com",
             "X-RapidAPI-Key: 3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
         ],
     ]);
     
     $response = curl_exec($curl);
     
     $json = json_decode($response, true);
 
 $race_id=$json['response'][0]['id'];
 
 $curl_driver = curl_init();
 
 curl_setopt_array($curl_driver, [
     CURLOPT_URL => "https://api-formula-1.p.rapidapi.com/rankings/races?race=$race_id",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => [
         "X-RapidAPI-Host: api-formula-1.p.rapidapi.com",
         "X-RapidAPI-Key: 3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
     ],
 ]);
 
 $res = curl_exec($curl_driver);
 
 $json_driver = json_decode($res,true);

     $last = array();
             $last[0] = array(
                             'name' => $json['response'][0]['competition']['name'],
                             'city' => $json['response'][0]['competition']['location']['city'],
                             'winner' => $json_driver['response'][0]['driver']['name']);
     
     curl_close($curl);
     curl_close($curl_driver);

     return response()->json($last);
 }

function next_race(){
 $curl = curl_init();

 curl_setopt_array($curl, [
     CURLOPT_URL => "https://api-formula-1.p.rapidapi.com/races?timezone=Europe%2FRome&next=1",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => [
         "X-RapidAPI-Host: api-formula-1.p.rapidapi.com",
         "X-RapidAPI-Key: 3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
     ],
 ]);
 
 $response = curl_exec($curl);

 $json = json_decode($response, true);

 $next = array();
         $next[0] = array(
                         'name'=>$json['response'][0]['competition']['name'],
                         'city'=>$json['response'][0]['competition']['location']['city']);
 
 curl_close($curl);            
 
 return response()->json($next);
}
}
/*
function last_race(){

    $response = Http::get('https://api-formula-1.p.rapidapi.com/races?type=race&timezone=Europe%2FRome&last=1',[
         "X-RapidAPI-Host" => "api-formula-1.p.rapidapi.com",
         "X-RapidAPI-Key" => "3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
    ]);
    $json = json_decode($response, true);
    if ($json->failed()) abort(500);

    $race_id = $json['response'][0]['id'];

    $response_driver=Http::get('https://api-formula-1.p.rapidapi.com/rankings/races?race='.$race_id, [
         "X-RapidAPI-Host" => "api-formula-1.p.rapidapi.com",
         "X-RapidAPI-Key" => "3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
    ]);
    $json_driver = json_decode($response_driver, true);
    if ($json->failed()) abort(500);

        $last = array();
    
                $last[0] = array(
                                'name' => $json['response'][0]['competition']['name'],
                                'city' => $json['response'][0]['competition']['location']['city'],
                                'winner' => $json_driver['response'][0]['driver']['name']);

        return response()->json($last);
}

function next_race(){
    $response = Http::get('https://api-formula-1.p.rapidapi.com/races?type=race&timezone=Europe%2FRome&next=1',[
         "X-RapidAPI-Host" => "api-formula-1.p.rapidapi.com",
         "X-RapidAPI-Key" => "3602ceead1mshea92eb39f141411p112260jsn27954b3ffb16"
    ]); 
    $json = json_decode($response, true);
    if ($json->failed()) abort(500);
    $next = array();

            $next[0] = array(
                            'name'=> $json['response'][0]['competition']['name'],
                            'city'=> $json['response'][0]['competition']['location']['city']);
    
    return response()->json($next);
}
}*/