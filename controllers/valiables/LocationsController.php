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

    public static function returnCountyName($countyID): string
    {

        $counties = self::getCounties();
        if (key_exists($countyID, $counties))
            return $counties[$countyID];
        else
            return $countyID;
    }

    public static function getConstituencies(): array
    {
        $cons = new Constituencies;
        return $cons->list();
    }

    public static function getConstituenciesByCounty($countyID): array
    {
        $constituencies = self::getConstituencies();
        if (key_exists($countyID, $constituencies))
            return $constituencies[$countyID];
    }

    public static function returnConstituencyName($countyID, $constituencyID): string
    {
        $constituencies = self::getConstituenciesByCounty($countyID);
        if (key_exists($constituencyID, $constituencies))
            return $constituencies[$constituencyID];
    }

    public static function getWards(): array
    {
        $wards = new Wards;
        return $wards->list();
    }

    public static function getWardsByConstituency($constituencyID): array
    {
        $wards = self::getWards();
        if (key_exists($constituencyID, $wards))
            return $wards[$constituencyID];
    }

    public static function returnWardName($constituencyID, $wardID)
    {
        $constituency = self::getWardsByConstituency($constituencyID);
        if ($constituency) {
            if (is_array($constituency)) {
                if (key_exists($wardID, $constituency))
                    return $constituency[$wardID];
            }
        }
    }
}
