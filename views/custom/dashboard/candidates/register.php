<?php

use app\controllers\valiables\LocationsController;
use kilyte\form\Form;

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
                                <h3 class="text-primary mb-1">Register Candindate</h3>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="row g-3">
                    <?php
                    $registerForm = Form::begin('', 'POST', ['class' => 'row g-3 needs-validation']);
                    ?>
                    <div class="col-md-6">
                        <div class="card h-md-100 ecommerce-card-min-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">Personal Infomation</h6>
                            </div>
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
                                        <label class="form-label">Position</label>
                                        <select name="position" class="form-select">
                                            <option value="1">President</option>
                                            <option value="2">Governor</option>
                                            <option value="3">Senetor</option>
                                        </select>
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
                                            <select class="form-select js-choice" id="county" size="1" required="required" name="constituency" data-options='{"removeItemButton":true,"placeholder":true}'>
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