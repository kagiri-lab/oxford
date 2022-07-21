<?php

use app\controllers\valiables\ColorsController;
use app\controllers\valiables\LocationsController;
use app\controllers\valiables\NumbersController;
use app\controllers\valiables\PositionsController;

$this->title = "$candidate->firstname $candidate->lastname - {{site-name}}";
?>

<div class="row g-3 mb-3">

    <div class="col-xxl-12 col-xl-12">
        <div class="d-flex mb-1"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">

                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">
                        <?= $candidate->firstname . ' ' . $candidate->lastname ?>
                    </span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"><?= PositionsController::positions()[$candidate->position] ?> <?= ($candidate->position != "1") ? ' - ' . LocationsController::returnCountyName($candidate->county) : '' ?></p>

            </div>
        </div>

        <div class="col-lg-12">
            <div class="row g-3">

                <div class="col-md-4">
                    <div class="card product-share-doughnut-width">
                        <div class="card-header pb-0 d-flex justify-content-center">
                            <h6 class="mb-0 mt-2 d-flex align-items-center">Total Votes</h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">
                            <div class="row align-items-end">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="fs-5 fw-normal font-sans-serif text-success lh-1"><?= NumbersController::shorten($candidate->votes) ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-12 d-flex justify-content-center">
                                    <div class="fs-6 fw-normal font-sans-serif text-primary lh-6"><?= $candidate->percentage ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card h-md-100 h-100">
                        <div class="card-body">
                            <div class="row h-100 justify-content-between g-0">
                                <div class="col-12 col-sm-6 col-xxl pe-2">
                                    <h6 class="mt-1">Competitors</h6>
                                    <div class="fs--2 mt-3">

                                        <?php
                                        $color = 0;
                                        foreach ($competitors as $comps => $comp) {
                                            $colorName = ColorsController::getColor($color);
                                        ?>
                                            <div class="row g-0 align-items-center pb-3">
                                                <div class="col pe-4">
                                                    <h6 class="text"><?= $comp['firstname'] . ' ' . $comp['lastname'] ?> - (<?= NumbersController::shorten($comp['votes']) ?>)</h6>
                                                    <div class="progress" style="height:5px">
                                                        <div class="progress-bar rounded-3 bg-<?= $colorName ?>" role="progressbar" style="width: <?= number_format($comp['percentage'], 2)  ?>%" aria-valuenow="<?= number_format($comp['percentage'], 2)  ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-end text-bottom">
                                                    <p class="mb-0 text-900 font-sans-serif"><span class="badge bg-<?= $colorName ?>"><?= number_format($comp['percentage'], 2)  ?>%</span></p>
                                                </div>
                                            </div>
                                        <?php
                                            $color++;
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 mt-2 d-flex align-items-center"><?= $candidate->firstname . ' ' . $candidate->lastname ?> Vote Logs</h6>
                        </div>
                        <div class="card-body">
                            <div id="tableExample2" data-list='{"valueNames":["constituency","ward","station","votes","submited"],"page":20,"pagination":true}'>
                                <div class="table-responsive scrollbar">

                                    <table class="table table-bordered table-striped fs--1 mb-0">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="sort" data-sort="constituency">Constituency</th>
                                                <th class="sort" data-sort="ward">Ward</th>
                                                <th class="sort" data-sort="station">Polling Station</th>
                                                <th class="sort" data-sort="votes">Votes</th>
                                                <th class="sort" data-sort="submited">Submited On</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            foreach ($voteLogs as $vlogs => $vlog) {
                                                $agent = $vlog['agent'];
                                            ?>
                                                <tr>
                                                    <td class="constituency"><?= ucwords($agent->constituency) ?></td>
                                                    <td class="ward"><?= ucwords($agent->ward) ?></td>
                                                    <td class="station"><?= $agent->station ?></td>
                                                    <td class="votes"><?= $vlog['votes'] ?></td>
                                                    <td class="submited"><?= $vlog['created_at'] ?></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                    <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>