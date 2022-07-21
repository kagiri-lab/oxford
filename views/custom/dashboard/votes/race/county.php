<?php

use app\controllers\valiables\NumbersController;
use app\controllers\valiables\PositionsController;

$this->title = "{{site-name}}";

$hasLogs = false;
if ($voteLogs)
    $hasLogs = true;

$totalVotes = 0;
foreach ($candidates as $cands => $cand)
    $totalVotes = $totalVotes + $cand['votes'];

?>


<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">
        <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Gubernatorial Candidates</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"><?= $county ?></p>
            </div>
        </div>


        <div class="py3 mb-3">
            <div class="row g-2">
                <?php
                if (count($candidates) > 0) {
                    foreach ($candidates as $cands => $cand) {
                        $candper = NumbersController::percentage($totalVotes, $cand['votes']);
                ?>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="pb-1 text-700"><?= $cand['firstname'] . ' ' . $cand['lastname'] ?> </h4>
                                            <div class="fs-3 fw-normal font-sans-serif text-primary lh-6"><?= NumbersController::shorten($cand['votes']) ?></div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-center">
                                            <div class="fs-6 fw-normal font-sans-serif text-primary lh-6"><?= $candper  ?>%</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php }
                } else {
                    ?>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="fs-3 fw-normal font-sans-serif text-primary lh-6">No candidates available</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php
                } ?>
            </div>
        </div>
        <?php
        if (count($candidates) > 0) { ?>
            <div class="card py-3 mb-3">
                <div class="card-body py-3">
                    <div class="row g-2">

                        <div class="col-12">
                            <br />
                            <?php
                            foreach ($candidates as $cands => $cand) {
                                $candvotes = $cand['votes'];
                                $candper = 0;
                                if ($totalVotes)
                                    $candper = ($candvotes / $totalVotes) * 100;
                            ?>
                                <div class="row g-0 align-items-center pb-3">
                                    <div class="col pe-4">
                                        <h6 class="text"><?= $cand['firstname'] . ' ' . $cand['lastname'] ?> - (<?= $candvotes ?>)</h6>
                                        <div class="progress" style="height:10px">
                                            <div class="progress-bar rounded-3 bg-primary" role="progressbar" style="width: <?= number_format($candper, 2)  ?>%" aria-valuenow="<?= number_format($candper, 2)  ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end text-bottom">
                                        <p class="mb-0 text-900 font-sans-serif"><span class="badge bg-primary"><?= number_format($candper, 2)  ?>%</span></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>