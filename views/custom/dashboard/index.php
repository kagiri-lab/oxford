<?php

$this->title = "{{site-name}}"

?>

<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-xl-12">
        <div class="card py-3 mb-3">
            <div class="card-body py-3">
                <div class="row g-0">
                    <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                        <h6 class="pb-1 text-700">Orders </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">15,450 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-primary"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-end pb-4 ps-3">
                        <h6 class="pb-1 text-700">Items sold </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">1,054 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-warning"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom border-end border-md-end-0 pb-4 pt-4 pt-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Refunds </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">$145.65 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-bottom-0 border-md-end pt-4 pb-md-0 ps-3 ps-md-0">
                        <h6 class="pb-1 text-700">Gross sale </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">$100.26 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">$109.65 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-danger"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-md-bottom-0 border-end pt-4 pb-md-0 ps-md-3">
                        <h6 class="pb-1 text-700">Shipping </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">$365.53 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                        <h6 class="pb-1 text-700">Processing </h6>
                        <p class="font-sans-serif lh-1 mb-1 fs-2">861 </p>
                        <div class="d-flex align-items-center">
                            <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                            <h6 class="fs--2 ps-3 mb-0 text-info"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <h6 class="mb-0">Total Sales</h6>
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check mb-0 d-flex">
                            <input class="form-check-input form-check-input-primary" id="ecommerceLastMonth" type="checkbox" checked="checked" />
                            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommerceLastMonth">Last Month<span class="text-dark d-none d-md-inline">: $32,502.00</span></label>
                        </div>
                        <div class="form-check mb-0 d-flex ps-0 ps-md-3">
                            <input class="form-check-input ms-2 form-check-input-warning opacity-75" id="ecommercePrevYear" type="checkbox" checked="checked" />
                            <label class="form-check-label ps-2 fs--2 text-600 mb-0" for="ecommercePrevYear">Prev Year<span class="text-dark d-none d-md-inline">: $46,018.00</span></label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales-ecomm" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales-ecomm"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pe-xxl-0">
                <!-- Find the JS file for the following chart at: src/js/charts/echarts/total-sales-ecommerce.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <div class="echart-line-total-sales-ecommerce" data-echart-responsive="true" data-options='{"optionOne":"ecommerceLastMonth","optionTwo":"ecommercePrevYear"}'></div>
            </div>
        </div>
    </div>
</div>
