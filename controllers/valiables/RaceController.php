<?php

namespace app\controllers\valiables;

class RaceController
{

    public static function races(): array
    {
        return [
            "president",
            "governor",
            "senator",
            "women rep",
            "MP",
            "MCA"
        ];
    }

    public static function positions(): array
    {
        return [
            "county" => [
                "governor",
                "senator",
                "women rep"
            ],
            "constituency" => [
                "MP"
            ],
            "ward" => [
                "MCA"
            ]
        ];
    }

    public static function getRaceWithPosition($position): string
    {
        $race = "1";
        $positions = self::positions();
        foreach ($positions as $pi => $pv) {
            if ($pi == $position) {
                print_r($pi);
                $race = self::getRaceName($pv[0]);
                break;
            }
        }
        return $race;
    }

    public static function getRaceName($code): string
    {
        $races = self::races();
        return $races[$code - 1];
    }

    public static function getRaceNo($name): string
    {
        $races = self::races();
        $no = 0;
        foreach ($races as $race) {
            $no++;
            if ($race == $name)
                break;
        }
        return $no;
    }
}
