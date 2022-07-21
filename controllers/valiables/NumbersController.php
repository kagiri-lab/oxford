<?php

namespace app\controllers\valiables;

class NumbersController
{

    public static function shorten($number)
    {
        if (empty($number))
            return 0;
        elseif ($number < 10000)
            return number_format($number);
        elseif ($number > 10000 && $number < 1000000) {
            $number = $number / 1000;
            return number_format($number, 2)."K";
        } elseif ($number > 1000000) {
            $number = $number / 1000000;
            return number_format($number, 2)."M";
        } else
            return $number;
    }

    public static function percentage($totalVotes, $candidatevotes)
    {
        if (empty($candidatevotes))
            return "0";
        elseif (empty($totalVotes))
            return "0";
        else {
            $percentage = ($candidatevotes / $totalVotes) * 100;
            return number_format($percentage, 2);
        }
    }
}
