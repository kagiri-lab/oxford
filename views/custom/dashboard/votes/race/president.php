<?php

use app\controllers\valiables\NumbersController;
use app\views\custom\dashboard\votes\display\SingleVotesCard;

$this->title = "Presidential Candidates - {{site-name}}";

?>

<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">

        <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Presidential Candidates</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"></p>
            </div>
        </div>

        <?php
        if (count($candidates)) {
        ?>
            <div class="py3 mb-3">
                <div class="row g-2">
                    <?php
                    foreach ($candidates as $cands => $cand) {
                        $candper = NumbersController::percentage($totalVotes, $cand['votes']);
                        $name = $cand['firstname'] . ' ' . $cand['lastname'];
                        SingleVotesCard::renderCard($cand['id'], $name, $cand['votes'], $candper, $cand['color']);
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
                                SingleVotesCard::renderProgress($cand['id'], $name, $candper, $cand['color']);
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row g-2 mt-4">
                <div class="col-12 d-flex align-items-center">
                    <div class="card col-12">
                        <div class="card-body">
                            <div class="col-12 d-flex align-items-center">
                                <div class='fs-5 text-900 fw-normal font-sans-serif lh-5'>No Candidates</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>