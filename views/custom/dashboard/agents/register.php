<?php

use app\controllers\valiables\locations\Constituencies;
use app\controllers\valiables\LocationsController;
use kilyte\form\Form;

$this->title = "{{site-name}}"

?>

<div class="row g-3 mb-3">
    <div class="col-12">
        <div class="row g-3">
            <div class="col-lg-12 col-xl-12 col-xxl-6 h-100">
                <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tasks"></i></span>
                    <div class="col">
                        <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Register Agent</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                        <p class="mb-0">Only registered agents can submit votes</p>
                    </div>
                </div>
                <div class="card theme-wizard mb-5 mb-lg-0 mb-xl-5 mb-xxl-0 h-100">
                    <?php
                    $registerForm = Form::begin('', 'POST', ['class' => 'row g-3 needs-validation']);
                    ?>
                    <div class="col-12">
                        <div class="card h-md-100 ecommerce-card-min-width">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'firstname')->isRequired()->show(); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'midname')->show(); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'lastname')->isRequired()->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'nationalid')->show(); ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'user')->isRequired()->show(); ?>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3"><label for="county">County</label>
                                            <select class="form-select js-choice" id="county" size="1" required="required" name="county" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                <option value="">Select County...</option>
                                                <?php
                                                $counties = LocationsController::getCounties();
                                                foreach ($counties as $countyID => $countyName)
                                                    echo "<option value='$countyID'>$countyName</option>";
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Please select one</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3"><label for="county">Constituency</label>
                                            <select class="form-select js-choice" id="constituency" size="1" required="required" name="constituency" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                <option value="">Select Constituency...</option>
                                                <?php
                                                $constituencies = LocationsController::getConstituencies();
                                                foreach ($constituencies as $countyid => $constList) {
                                                    if (is_array($constList)) {
                                                        foreach ($constList as $cnid => $cnname) {
                                                            $cn = ucwords($cnname);
                                                            echo "<option value='$cnid'>$cn</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Please select one</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3"><label for="county">Ward</label>
                                            <select class="form-select js-choice" id="ward" size="1" required="required" name="ward" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                <option value="">Select Ward...</option>
                                                <?php
                                                $wards = LocationsController::getWards();
                                                foreach ($wards as $countyid => $constList) {
                                                    if (is_array($constList)) {
                                                        foreach ($constList as $cnid => $cnname) {
                                                            $cn = ucwords($cnname);
                                                            echo "<option value='$cnid'>$cn</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">Please select one</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <?php $registerForm->field($model, 'station')->show(); ?>
                                    </div>

                                    <div class="col-lg-6 mt-4">
                                        <input class="btn btn-primary" type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $registerForm->end(); ?>
                </div>

            </div>

        </div>
    </div>

</div>