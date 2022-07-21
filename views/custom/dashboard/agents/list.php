<?php
$this->title = "All Agents - {{site-name}}";
print_r($agents);
?>

<div class="row g-3 mb-3">
    <div class="col-lg-12 col-xl-12 col-xxl-6 h-100">
        <div class="d-flex mb-2"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
            <div class="col">
                <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">All Agent</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                <p class="mb-0">Only registered agents can submit votes</p>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
            <div class="table-responsive scrollbar">
                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" data-sort="name">Name</th>
                            <th class="sort" data-sort="county">County</th>
                            <th class="sort" data-sort="constituency">Constituency</th>
                            <th class="sort" data-sort="ward">Ward</th>
                            <th class="sort" data-sort="station">Polling Station</th>
                            <th class="sort" data-sort="created_at">Registered On</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php
                        foreach ($agents as $agts => $agt) {

                        ?>
                            <tr>
                                <td class="name"><?= $agt['firstname'] . ' ' . $agt['lastname'] ?></td>
                                <td class="county"><?= $agt['county'] ?></td>
                                <td class="constituency"><?= $agt['constituency'] ?></td>
                                <td class="ward"><?= $agt['ward'] ?></td>
                                <td class="station"><?= $agt['station'] ?></td>
                                <td class="created_at"><?= $agt['created_at'] ?></td>
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