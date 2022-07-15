<?php

$this->title = "{{site-name}}";

$hasLogs = false;
if ($voteLogs)
    $hasLogs = true;

?>

<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">
        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-0">
                    <div class="col-6 col-md-3 border-200 border-bottom border-end pb-4">
                        <h6 class="pb-1 text-700">Name </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">1,000 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">21.8% </h6>
                        </div>
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
                                            <td class="candidate"><?= $vl['candidate'] ?></td>
                                            <td class="votes"><?= $vl['votes'] ?></td>
                                            <td class="agent"><?= $vl['agent'] ?></td>
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