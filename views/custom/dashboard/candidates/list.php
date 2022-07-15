<?php

use app\controllers\valiables\PositionsController;

$this->title = "{{site-name}}"

?>

<div class="row g-3 mb-3">
    <div class="col-12">
        <div class="row g-3">
            <div class="col-12">
                <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">

                        <div class="position-relative z-index-2">
                            <div>
                                <h3 class="text-primary mb-1">Candindates</h3>
                            </div>

                            <div class="row">

                                <div id="tableExample2" data-list='{"valueNames":["name","position","agcountye"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="name">Name</th>
                                                    <th class="sort" data-sort="position">Position</th>
                                                    <th class="sort" data-sort="county">County</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php
                                                foreach ($candidates as $candidate) {

                                                ?>
                                                    <tr class="btn-reveal-trigger">
                                                        <td class="name"><a class="text-muted" href="/admin/candidates/view/<?= $candidate['id'] ?>"><?= $candidate['firstname'] . ' ' . $candidate['midname'] . ' ' . $candidate['lastname'] ?></td>
                                                        <td class="position"><?= PositionsController::positions()[$candidate['position']] ?></td>
                                                        <td class="county">
                                                            <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                                                    <div class="bg-white py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                                                                </div>
                                                            </div>
                                                        </td>
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

</div>