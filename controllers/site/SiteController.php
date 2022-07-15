<?php

namespace app\controllers\site;

use kilyte\Controller;

class SiteController extends Controller
{

    public function siteIndex()
    {
        $this->setLayout('site.main');
        return $this->render([], 'site.home');
    }

    public function contact()
    {
        $this->setLayout('site.main');
        return $this->render([], 'site.contact');
    }

    public function about()
    {
        $this->setLayout('site.main');
        return $this->render([], 'site.about');
    }
}
