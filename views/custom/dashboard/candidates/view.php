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
                                <h3 class="text-primary mb-1"><?= $candidate->firstname . ' ' . $candidate->midname . ' ' . $candidate->lastname ?></h3>
                                <h5 class="mb-1"><?= PositionsController::positions()[$candidate->position] ?></h5>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="card product-share-doughnut-width">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">Total Votes</h6>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-end">
                                <div class="row align-items-end">
                                    <div class="col">
                                        <p class="font-sans-serif lh-1 mb-1 fs-2">20,000</p><span class="badge badge-soft-success rounded-pill"><span class="fas fa-caret-up me-1"></span>3.5%</span>
                                    </div>
                                    <div class="col-auto ps-0">
                                        <canvas class="my-n5" id="votesDoughnut" width="112" height="112"></canvas>
                                        <p class="mb-0 text-center fs--2 mt-4 text-500">Target: <span class="text-800">95%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-md-100 h-100">
                            <div class="card-body">
                                <div class="row h-100 justify-content-between g-0">
                                    <div class="col-5 col-sm-6 col-xxl pe-2">
                                        <h6 class="mt-1">Competitors</h6>
                                        <div class="fs--2 mt-3">
                                            <div class="d-flex flex-between-center mb-1">
                                                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">Falcon</span></div>
                                                <div class="d-xxl-none">57%</div>
                                            </div>
                                            <div class="d-flex flex-between-center mb-1">
                                                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Sparrow</span></div>
                                                <div class="d-xxl-none">20%</div>
                                            </div>
                                            <div class="d-flex flex-between-center mb-1">
                                                <div class="d-flex align-items-center"><span class="dot bg-warning"></span><span class="fw-semi-bold">Phoenix</span></div>
                                                <div class="d-xxl-none">22%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto position-relative">
                                        <div class="echart-product-share"></div>
                                        <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 mt-2 d-flex align-items-center">All Votes</h6>
                            </div>
                            <div class="card-body">
                                <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="name">Name</th>
                                                    <th class="sort" data-sort="email">Email</th>
                                                    <th class="sort" data-sort="age">Age</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <tr>
                                                    <td class="name">Anna</td>
                                                    <td class="email">anna@example.com</td>
                                                    <td class="age">18</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Homer</td>
                                                    <td class="email">homer@example.com</td>
                                                    <td class="age">35</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Oscar</td>
                                                    <td class="email">oscar@example.com</td>
                                                    <td class="age">52</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Emily</td>
                                                    <td class="email">emily@example.com</td>
                                                    <td class="age">30</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Jara</td>
                                                    <td class="email">jara@example.com</td>
                                                    <td class="age">25</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Clark</td>
                                                    <td class="email">clark@example.com</td>
                                                    <td class="age">39</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Jennifer</td>
                                                    <td class="email">jennifer@example.com</td>
                                                    <td class="age">52</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Tony</td>
                                                    <td class="email">tony@example.com</td>
                                                    <td class="age">30</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Tom</td>
                                                    <td class="email">tom@example.com</td>
                                                    <td class="age">25</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Michael</td>
                                                    <td class="email">michael@example.com</td>
                                                    <td class="age">39</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Antony</td>
                                                    <td class="email">antony@example.com</td>
                                                    <td class="age">39</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Raymond</td>
                                                    <td class="email">raymond@example.com</td>
                                                    <td class="age">52</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Marie</td>
                                                    <td class="email">marie@example.com</td>
                                                    <td class="age">30</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Cohen</td>
                                                    <td class="email">cohen@example.com</td>
                                                    <td class="age">25</td>
                                                </tr>
                                                <tr>
                                                    <td class="name">Rowen</td>
                                                    <td class="email">rowen@example.com</td>
                                                    <td class="age">39</td>
                                                </tr>
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

<script>
    var votesDoughnutInit = function votesDoughnutInit() {
        var votesDoughnutElement = document.getElementById('votesDoughnut');

        var getOptions = function getOptions() {
            return {
                type: 'doughnut',
                data: {
                    labels: ['Flacon', 'Sparrow'],
                    datasets: [{
                        data: [50, 88],
                        backgroundColor: [utils.getColor('primary'), utils.getColor('300')],
                        borderColor: [utils.getColor('primary'), utils.getColor('300')]
                    }]
                },
                options: {
                    tooltips: chartJsDefaultTooltip(),
                    rotation: -90,
                    circumference: '180',
                    cutout: '80%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            };
        };

        chartJsInit(votesDoughnutElement, getOptions);
    };
</script>