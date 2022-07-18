<?php

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
        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-2">

                    <?php
                    foreach ($candidates as $cands => $cand) {
                        $candvotes = $cand['votes'];
                        $candper = ($candvotes / $totalVotes) * 100;
                    ?>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="pb-1 text-700"><?= $cand['firstname'] . ' ' . $cand['lastname'] ?> </h6>
                                    <p class="font-sans-serif lh-1 mb-1 fs-2"><?= $cand['votes'] ?> </p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs--1 text-500 mb-0"><?= number_format($candper, 2)  ?>% </h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="col-12">
                        <br />
                        <?php
                        foreach ($candidates as $cands => $cand) {
                            $candvotes = $cand['votes'];
                            $candper = ($candvotes / $totalVotes) * 100;
                        ?>
                            <div class="row g-0 align-items-center pb-3">
                                <div class="col pe-4">
                                    <h6 class="text"><?= $cand['firstname'] . ' ' . $cand['lastname'] ?></h6>
                                    <div class="progress" style="height:20px">
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