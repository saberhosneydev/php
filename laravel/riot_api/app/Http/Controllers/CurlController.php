<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CurlController extends Controller
{
    public function view() {
    	$client = new Client(['base_uri' => 'https://euw1.api.riotgames.com/']);
    	$response = $client->request('GET', 'lol/summoner/v3/summoners/by-name/ISIRileyI?api_key=RGAPI-f02d1ee8-798e-4205-9faf-a1c386450a3f');
    	$body = $response->getBody()->getContents();
    	$con = json_decode($body);
    	return view('curl' ,compact('con'));
    }
}
