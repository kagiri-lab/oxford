<?php

namespace app\views\custom\dashboard\votes\display;

use app\controllers\valiables\NumbersController;

class SingleVotesCard
{

    public static function renderCard($id, $name, $votes, $percentage, $color = "primary")
    {
        echo '<div class="col-lg-12 col-xxl-6 col-xl-6 col-md-12 col-sm-12">';
        echo "<div class='card border border-$color rounded-1 bg-$color'>";
        echo "<a class='btn' href='/admin/candidates/view/$id'>";
        echo "<div class='card-body'><div class='row'>";
        echo '<div class="col-lg-8 col-md-12 col-sm-12"><div class="row"><div class="col-lg-12">';
        echo "<h3 class='pb-1 text-100'>$name</h3></div><hr/>";
        echo '<div class="col-12">';
        echo "<div class='fs-4 text-100 fw-normal font-sans-serif lh-1'>";
        echo NumbersController::shorten($votes);
        echo '</div></div></div></div>';
        echo '<div class="col-lg-4 col-md-12 d-flex align-items-center">';
        echo "<div class='fs-5 text-100 fw-normal font-sans-serif lh-5'>";
        echo "$percentage%";
        echo '</div></div></div></div></a></div></div>';
    }

    public static function renderProgress($id, $name, $percentage, $color = "primary")
    {
        echo "<div class='kanban-item'>";
        echo '<div class="row g-0 align-items-center pb-3"><div class="col pe-4">';
        echo '<h6 class="text">';
        echo $name . '</h6>';
        echo '<div class="progress" style="height:20px">';
        echo '<div class="progress-bar rounded-3 ';
        echo "bg-$color";
        echo ' role="progressbar" style="width:';
        echo "$percentage%";
        echo '" aria-valuenow="';
        echo $percentage;
        echo '" aria-valuemin="0" aria-valuemax="100"></div></div></div>';
        echo '<div class="col-auto text-end text-bottom">';
        echo '<p class="mb-0 text-900 font-sans-serif">';
        echo "<span class='badge bg-$color'>";
        echo "$percentage%</span></p></div></div></div>";
    }

    public static function renderNoCandidates($text)
    {

        echo '<div class="row g-2 mt-4">';
        echo '<div class="col-12 d-flex align-items-center">';
        echo "<div class='fs-2 text-900 fw-normal font-sans-serif lh-5'>$text</div>";
        echo "</div></div>";
    }

    public static function renderCandidates($list, $race)
    {
        $candidates = $list['canditates'];
        $totalVotes = $list['totalVotes']; ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex mb-4">
                    <div class="col">
                        <p class="mb-0"><?= $race ?> Candidates</p>
                    </div>
                </div>
                <?php
                if (count($candidates) > 0) { ?>
                    <div class="py3 mb-3">
                        <div class="row g-2">
                            <?php
                            foreach ($candidates as $cands => $cand) {
                                $candper = NumbersController::percentage($totalVotes, $cand['votes']);
                                $name = $cand['firstname'] . ' ' . $cand['lastname'];
                                SingleVotesCard::renderCard($cand['id'], $name, $cand['votes'], $candper, $cand['color']);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row g-2 mt-4">
                        <div class="col-12 kanban-items-container">
                            <?php
                            foreach ($candidates as $cands => $cand) {
                                $candvotes = $cand['votes'];
                                $candper = NumbersController::percentage($totalVotes, $candvotes);
                                $name = $cand['firstname'] . ' ' . $cand['lastname'];
                                SingleVotesCard::renderProgress($cand['id'], $name, $candper, $cand['color']);
                            } ?>
                        </div>
                    </div>
                <?php } else
                    SingleVotesCard::renderNoCandidates("No aspirants");
                ?>
            </div>
        </div>
<?php
    }
}
