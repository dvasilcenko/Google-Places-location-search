<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\History;
use Input;

class MainController extends Controller
{
    public function index()
    {
        $history = DB::table('history')
                ->orderBy('id', 'desc')
                ->get();
        
        return view('index', ['history' => $history]);
    }
    
    public function getJson(Request $request)
    {
        $name = $request->input('name');
        $name = str_replace(' ', '%20', $name);
        
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $coordinates = $lat . ',' . $lng;
        
        $url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='
            . $coordinates . '&name=' . $name . '&key=AIzaSyD5uVmtGAi8aZSHP5Oyl6QcNiatyuMUmC4';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        
        $history = new History;
        $history->name = $request->input('name');
        $history->lat = $request->input('lat');
        $history->lng = $request->input('lng');
        $history->save();
        
        $geonames = $data['results'][0];
        echo json_encode($geonames['geometry']['location']);
    }
}