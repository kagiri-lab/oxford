<?php

use kilyte\controls\Block;

$this->title = 'Candidates - {{site-name}}';
$blockView = new Block();

$hasCandidates = false;

foreach ($candidates as $candidate => $val) {
    if ($val['canvote']) {
        $hasCandidates = true;
        break;
    }
}
?>

<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/votes">Home</a>
            </li>
            <li class="breadcrumb-item active"><?= $position ?></li>
        </ol>
    </nav>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <h5 class="card-title">Candidates | <?= $position ?></h5>
                    <?php

                    if ($hasCandidates) { ?>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($candidates as $candidate => $val) {
                                    if ($val['canvote']) {
                                ?>
                                        <tr>
                                            <td>
                                                <a href="/votes/candidate/<?= $val['position'] ?>/<?= $val['id'] ?>" class="text-primary fw-bold">
                                                    <?= $val['firstname'] . ' ' . $val['midname'] . ' ' . $val['lastname'] ?>
                                                </a>
                                            </td>
                                            <td><?= number_format($val['votes']) ?></td>
                                        </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>

                    <?php } else {
                        echo '<p>No Candidates</p>';
                    } ?>

                </div>
            </div>
        </div>


    </div>
</section>