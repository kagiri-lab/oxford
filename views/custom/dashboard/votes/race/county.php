<?php

use app\controllers\valiables\NumbersController;
use app\views\custom\dashboard\votes\display\SingleVotesCard;

$this->title = "$county Candidates - {{site-name}}";

?>


<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">
        <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3"><?= $county ?> County Candidates</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"></p>
            </div>
        </div>

        <?php
        SingleVotesCard::renderCandidates($governors, "Governors");
        SingleVotesCard::renderCandidates($senators, "Senator");
        SingleVotesCard::renderCandidates($womenreps, "Women Representative");

        ?>

        <div class="card mb-4">
            <div class="card-body">
                <div class="col">
                    <p class="mb-4">Member Of Pariament Candidates</p>
                    <?php

                    foreach ($constituency as $conts => $cont) {
                        $constName = ucwords($conts . ' Constituency');
                        if (count($cont['canditates']) > 0) { ?>
                            <div class='card mb-2'>
                                <div class='card-body row'>
                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                        <?= SingleVotesCard::renderMPTableCandidates($cont, $constName) ?>
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <?php
                                        foreach ($cont['wards'] as $wards => $ward)
                                            SingleVotesCard::renderWardTableCandidates($ward, ucwords($wards). ' Ward');

                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>