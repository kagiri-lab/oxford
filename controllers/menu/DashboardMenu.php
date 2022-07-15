<?php


namespace app\controllers\menu;

class DashboardMenu extends MenuItems
{

    private function start($text)
    {
        $id = str_replace(" ", "", $text);
        $id = trim($id);

        if (is_string($text)) {
            echo "<a class='nav-link dropdown-indicator' href='#$id' role='button' data-bs-toggle='collapse' aria-expanded='false' aria-controls='$id'>";
            echo "<div class='d-flex align-items-center'><span class='nav-link-text ps-1'>$text</span>";
            echo "</div></a><ul class='nav collapse' id='$id'>";
        }
    }

    private function end()
    {
        echo "</ul>";
    }
    private function main_li($text, $url)
    {
        if (is_string($text)) {
            if (is_string($url)) {
                echo "<a class='nav-link' href='$url' role='button' data-bs-toggle='' aria-expanded='false'>";
                echo "<div class='d-flex align-items-center'>";
                echo "<span class='nav-link-text ps-1'>$text</span></div></a>";
            }
        }
    }

    private function li($text, $url)
    {
        if (is_string($text)) {
            if (is_string($url)) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='$url' data-bs-toggle='' aria-expanded='false'>";
                echo "<div class='d-flex align-items-center'><span class='nav-link-text ps-1'>$text</span></div></a></li>";
            }
        }
    }

    public function load()
    {
        $menuItems = $this->adminMenu();
        foreach ($menuItems as $mm => $mv) {
            if (is_array($mv)) {
                if (is_string($mv))
                    $this->li($mm, $mv);
                else {
                    $this->start($mm);
                    foreach ($mv as $mm1 => $mv1) {
                        if (is_string($mv1))
                            $this->li($mm1, $mv1);
                    }
                    $this->end();
                }
            } else
                $this->main_li($mm, $mv);
        }
    }
}
