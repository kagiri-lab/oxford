<?php

$this->title = "Select $location - {{site-name}}";

$cnt = number_format(count($list));
if ($cnt < 10)
    $pages = $cnt;
elseif ($cnt < 20)
    $pages = $cnt * 2;
else
    $pages = $cnt / 3;

?>

<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">

        <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Select <?= ucwords($location) ?></span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0"></p>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-lg-12">
                <div id="tableExample2" data-list='{"valueNames":["name","code"],"page":<?= $pages ?>,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th class="sort" data-sort="code">#Code</th>
                                    <th class="sort" data-sort="name">Name</th>
                                    <th data-sort=""></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                $second_location = "county";
                                foreach ($list as $lid => $lval) {
                                    switch ($location) {
                                        case "county":
                                            $second_location = "constituency";
                                            break;
                                        case "constituency":
                                            $second_location = "ward";
                                            break;
                                    }
                                ?>
                                    <tr>
                                        <?php
                                        if ($second_location != "county") { ?>
                                            <td class="code"><a href="/admin/locations/<?= $second_location ?>/<?= $lid ?>">#<?= sprintf("%03d", $lid) ?></a></td>
                                        <?php } else { ?>
                                            <td class="code">#<?= sprintf("%03d", $lid) ?></td>
                                        <?php } ?>
                                        <td class="name"><?= ucwords($lval) ?></td>
                                        <td><a href="/admin/race/governor/<?= $lid ?>"><span class="badge badge-soft-info">View Candidates</span></a></td>
                                    </tr>
                                <?php
                                }

                                ?>

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