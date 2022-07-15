<?php

use kilyte\controls\Block;
use kilyte\form\Form;

$this->title = "$candidate->firstname $candidate->lastname - {{site-name}}";
$blockView = new Block();
?>

<div class="pagetitle">
    <h1>Profile</h1>
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
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <!-- <img src="/assets/default/img/profile-img.jpg" alt="{{user-full-name}}" class="rounded-circle" /> -->
                    <h2><?php echo "{$candidate->firstname} {$candidate->lastname}" ?></h2>
                    <h6><?= $position ?></h6>

                    <div class="row mb-3">
                        <?php
                        $votingForm = Form::begin('', 'POST', ['class' => 'row g-3 needs-validation']);

                        ?>

                        <div class="row">

                            <div class="col-lg-12">
                                <?php $votingForm->field($model, 'votes')->show(); ?>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <input type="submit" value="Submit" class="btn btn-primary" />
                            </div>
                        </div>

                        <?php
                        $votingForm->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>