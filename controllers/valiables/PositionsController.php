<?php

namespace app\controllers\valiables;


class PositionsController{

    public static function positions(): array
    {
        return [
            "Null",
            "President",
            "Governor",
            "Senetor",
            "Women Rep",
            "Member Of Pariament",
            "Member Of County Assembly"
        ];
    }
}