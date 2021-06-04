<?php

namespace App\Http\Controllers;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Http\Request;
use App\Models\Client;

class ControllerApi extends Controller
{
    public function home()
    {
        if (isset($_GET['date'])) {
            $filtro = $_GET['date'];
            $client = Client::where("date", ">", $filtro)->get();
        }

        if (isset($_GET['name'])) {
            $filtro = $_GET['name'];
            $client = Client::where("name", "like", "%" . $filtro . "%")->get();
        }

        if (!$filtro) {
            $client = Client::all();
        }

        return $client;
    }
}
