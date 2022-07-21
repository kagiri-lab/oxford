<?php

namespace app\controllers\api;

use app\controllers\valiables\LocationsController;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class SelectLocationController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $response->redirect('/');
        return;
    }
    public function getCounties()
    {
        $counties = LocationsController::getCounties();
        return [
            "counties" => $counties
        ];
    }

    public function getConstituencies(Request $request, Response $response)
    {
        $county = $request->getRouteParam('county');
        if (empty($county))
            return [];
        return LocationsController::getConstituenciesByCounty($county);
    }

    public function getWards(Request $request, Response $response)
    {
        $constituency = $request->getRouteParam('constituency');
        if (empty($constituency))
            return [];
        return LocationsController::getWardsByConstituency($constituency);
    }
}
