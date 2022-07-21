<?php

use app\controllers\valiables\ColorsController;
use app\controllers\valiables\NumbersController;
use app\controllers\valiables\PositionsController;
use app\views\custom\dashboard\votes\display\SingleVotesCard;

$this->title = "Presidential Candidates - {{site-name}}";

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
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Presidential Candidates</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"></p>
            </div>
        </div>

        <div class="py3 mb-3">
            <div class="row g-2">
                <?php
                foreach ($candidates as $cands => $cand) {
                    $candper = NumbersController::percentage($totalVotes, $cand['votes']);
                    $name = $cand['firstname'] . ' ' . $cand['lastname'];
                    SingleVotesCard::renderCard($name, $cand['votes'], $candper, $cand['color']);
                } ?>
            </div>
        </div>
        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-2">

                    <div class="col-12 kanban-items-container">
                        <?php
                        foreach ($candidates as $cands => $cand) {
                            $candvotes = $cand['votes'];
                            $candper = NumbersController::percentage($totalVotes, $candvotes);
                            $name = $cand['firstname'] . ' ' . $cand['lastname'];
                            SingleVotesCard::renderProgress($name, $candper, $cand['color']);
                        } ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <h6 class="mb-0">Votes Logs</h6>
                    </div>

                </div>
            </div>
            <div class="card-body pe-xxl-0">
                <?php
                if ($hasLogs) { ?>
                    <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort" data-sort="candidate">Candidate</th>
                                        <th class="sort" data-sort="votes">Votes</th>
                                        <th class="sort" data-sort="agent">Agent</th>
                                        <th class="sort" data-sort="station">Station</th>
                                        <th class="sort" data-sort="date">Date - Time</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php
                                    foreach ($voteLogs as $vlog => $vl) {
                                    ?>
                                        <tr>
                                            <td class="candidate"><?= $vl['candidateName'] ?></td>
                                            <td class="votes"><?= $vl['votes'] ?></td>
                                            <td class="agent"><?= $vl['agentName'] ?></td>
                                            <td class="station"><?= $vl['station'] ?></td>
                                            <td class="station"><?= $vl['created_at'] ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                        </div>
                    </div>

                <?php } else {
                    echo "<p>No Logs</p>";
                } ?>

            </div>
        </div>
    </div>
</div>