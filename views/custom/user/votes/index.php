<?php

$this->title = '{{site-name}}';

?>

<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/votes">Home</a>
            </li>
            <li class="breadcrumb-item active">Votes Submitted</li>
        </ol>
    </nav>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-12">
            <h5 class="card-title">Votes Submitted</h5>
            <?php

            if ($votes) { ?>
                <table class="table table-bordered table-striped fs--1 mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Candindate</th>
                            <th scope="col">Votes</th>
                            <th scope="col">Polling Station</th>
                            <th scope="col">Submited On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($votes as $vts => $vt) {
                        ?>
                            <tr>
                                <td><?= $vt['candidate'] ?></td>
                                <td><?= number_format($vt['votes']) ?></td>
                                <td><?= $vt['station'] ?></td>
                                <td><?= $vt['created_at'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } else {
                echo '<p>No votes submited</p>';
            } ?>
        </div>
    </div>
</section>