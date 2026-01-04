<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show(Service $service)
    {
        return view('serv_detail', [
            'service' => $service,
            'pageTitle' => $service->title . ' - CNAO'
        ]);
    }
}
