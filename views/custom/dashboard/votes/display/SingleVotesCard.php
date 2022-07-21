<?php

namespace app\views\custom\dashboard\votes\display;

use app\controllers\valiables\NumbersController;

class SingleVotesCard
{

    public static function renderCard($name, $votes, $percentage, $color = "primary")
    {
        echo '<div class="col-lg-12 col-xxl-6 col-xl-6 col-md-12 col-sm-12">';
        echo "<div class='card border border-$color rounded-1'><div class='card-body'><div class='row'>";
        echo '<div class="col-lg-8 col-md-12 col-sm-12"><div class="row"><div class="col-lg-12">';
        echo "<h3 class='pb-1 text-700'>$name</h3></div><hr/>";
        echo '<div class="col-12">';
        echo "<div class='fs-4 fw-normal font-sans-serif text-$color lh-1'>";
        echo NumbersController::shorten($votes);
        echo '</div></div></div></div>';
        echo '<div class="col-lg-4 col-md-12 d-flex align-items-center">';
        echo "<div class='fs-6 fw-normal font-sans-serif text-$color lh-6'>";
        echo "$percentage%";
        echo '</div></div></div></div></div></div>';
    }

    public static function renderProgress($name, $percentage, $color = "primary")
    {
        echo "<div class='kanban-item'>";
        echo '<div class="row g-0 align-items-center pb-3"><div class="col pe-4">';
        echo '<h6 class="text">';
        echo $name . '</h6>';
        echo '<div class="progress" style="height:20px">';
        echo '<div class="progress-bar rounded-3 ';
        echo "bg-$color";
        echo ' role="progressbar" style="width:';
        echo "$percentage%";
        echo '" aria-valuenow="';
        echo $percentage;
        echo '" aria-valuemin="0" aria-valuemax="100"></div></div></div>';
        echo '<div class="col-auto text-end text-bottom">';
        echo '<p class="mb-0 text-900 font-sans-serif">';
        echo "<span class='badge bg-$color'>";
        echo "$percentage%</span></p></div></div></div>";
    }
}
