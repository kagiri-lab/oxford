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
                                <h3 class="text-primary mb-1">Users</h3>
                            </div>

                            <div class="row">

                                <div id="tableExample2" data-list='{"valueNames":["name","email","status","created", "agent"],"page":20,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="name">Name</th>
                                                    <th class="sort" data-sort="email">Email</th>
                                                    <th class="sort" data-sort="status">Status</th>
                                                    <th class="sort" data-sort="agent">Agent</th>
                                                    <th class="sort" data-sort="created">Created On</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php
                                                foreach ($users as $user) {

                                                ?>
                                                    <tr class="btn-reveal-trigger">
                                                        <td class="name"><?= $user['firstname'] . ' ' . $user['lastname'] ?></td>
                                                        <td class="email"><?= $user['email'] ?></td>
                                                        <td class="status"><?= ($user['status']) ? 'Admin' : 'User' ?></td>
                                                        <td class="agent">
                                                            <?php
                                                            if (!$user['agent']) { ?>
                                                                <a class="btn btn-sm" href="/admin/agents/register/<?= $user['id'] ?>">
                                                                    <span class="badge badge-soft-primary">Register As Agent</span>
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="created"><?= $user['created_at'] ?></td>
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