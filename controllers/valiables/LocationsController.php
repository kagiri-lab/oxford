<?php

namespace app\controllers\valiables;

use app\controllers\valiables\locations\Constituencies;
use app\controllers\valiables\locations\Counties;
use app\controllers\valiables\locations\Wards;

class LocationsController
{

    public static function getCounties(): array
    {
        $counties = new Counties;
        return $counties->list();
    }

    public static function getConstituencies(): array
    {
        $cons = new Constituencies;
        return $cons->list();
    }

    public static function getConstituenciesByCounty($countyID): array
    {
        return self::getConstituencies()[$countyID];
    }

    public static function getWards(): array
    {
        $wards = new Wards;
        return $wards->list();
    }

    public static function getWardsByConstituency($constituencyID): array
    {
        return self::getWards()[$constituencyID];
    }
}
