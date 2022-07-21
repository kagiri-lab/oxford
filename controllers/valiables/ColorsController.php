<?php

namespace app\controllers\valiables;

class ColorsController
{

    public static function colors(): array
    {
        return [
            'primary',
            'secondary',
            'success',
            'info',
            'warning',
            'danger'
        ];
    }

    public static function getColor($colorID): string
    {
        return self::colors()[$colorID];
    }
}
