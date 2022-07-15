<?php


namespace app\controllers\menu;


class StickyMenu extends MenuItems
{


    private function start($text)
    {
        if (is_string($text)) {
            $text = strtoupper($text);
            echo "<li class='list-inline-item'><a>$text <i class='fa fa-angle-down'></i></a>";
            echo "<ul class='dropdown list-unstyled'>";
        }
    }

    private function end()
    {
        echo "</ul></li>";
    }


    private function li($text, $url)
    {
        if (is_string($text)) {
            $text = strtoupper($text);
            if (is_string($url))
                echo "<li><a href='$url'>$text</a></li>";
        }
    }

    public function main_li($text, $url)
    {
        if (is_string($text)) {
            $text = strtoupper($text);
            if (is_string($url))
                echo "<li class='list-inline-item'><a href='$url'>$text</a></li>";
        }
    }


    public function load()
    {
        $menuItems = $this->mainMenuBarItems();
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
