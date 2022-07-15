<?php


namespace app\controllers\menu;


class CategoryMenu extends MenuItems
{

    private function li($text, $url)
    {
        if (is_string($text)) {
            $text = strtoupper($text);
            if (is_string($url))
                echo "<li><a href='$url'>$text</a></li>";
        }
    }

    public function load()
    {
        $menuItems = $this->categoryMenu();
        foreach ($menuItems as $mm => $mv) {
            if (is_string($mv))
                $this->li($mm, $mv);
        }
    }
}
