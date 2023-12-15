<?php

namespace App\Http\Controllers;

use App\Http\Requests\GsPostRequest;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class MainController extends Controller
{
    function index(){
        return view('main.index');
    }

    function store(GsPostRequest $request){

        info('Данные валидны.');

        $client = new Google_Client();
        $client->setApplicationName('GStest');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $client->setAccessType('offline');
        $client->setAuthConfig('my_secret.json');
            
        $service = new Google_Service_Sheets($client);
        $spreadsheetId = '15x10hU2S-1aIDtx5t2OXCeTNplG74zzygqZjnFyP1x8';
            
        $range = 'list1';
        date_default_timezone_set('Europe/Moscow');
        $values = [[$request['name'], $request['mobile_number'] , $request['email'], date('d.m.Y h:i:s')]];
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values,
        ]);
        $params = ['valueInputOption' => 'RAW'];
        $insert = ['insertDataOption' => 'INSERT_ROWS'];
        $result = $service->spreadsheets_values->append(
            $spreadsheetId,
            $range,
            $body,
            $params,
        );
        session(['alert' => 'Запись успешно добавлена!']);

        return redirect()->route("gs.create");
        
    }
}
