<?php

namespace app\controllers\menu;

class MenuItems
{

    public function mainMenuBarItems()
    {
        return [
            "Category" => [
                "Kids" => "/category/kids",
                "Men" => "/category/men",
                "Ladies" => [
                    "Dress" => "/category/dress",
                    "Shoes" => "/category/shoes"
                ]
            ],
            "About" => "/about",
            "Contacts" => "/contact",
            "More" => [
                "FAQ" => "/faq",
                "Terms &amp; Conditions" => "/terms-conditions"
            ]
        ];
    }


    public function categoryMenu()
    {

        return [
            "Category" => "/category/category",
            "Category 1" => "/category/category",
            "Category 2" => "/category/category",
            "Category 3" => "/category/category",
            "Category 4" => "/category/category",
            "Category 5" => "/category/category",
            "Category 6" => "/category/category",
            "Category 7" => "/category/category",
            "Category 8" => "/category/category"
        ];
    }


    public function adminMenu()
    {
        return [
            "Dashboard" => "/admin",
            "Votes" => [
                "President" => "/admin/race/1",
                "Governor" => "/admin/race/2"
            ],
            "Candidates" => [
                "List" => "/admin/candidates/list",
                "Register" => "/admin/candidates/register"
            ],
            "Agents" => [
                "List" => "/admin/agents/list",
                "Register" => "/admin/agents/register",
                "All Users" => "/admin/agents/users/all"
            ]
        ];
    }
}
