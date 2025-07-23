<?php

namespace App\Services;

use App\Models\cmsPage;

class CmsService
{
    protected $cmsPages;

    public function __construct(cmsPage $cmsPages)
    {
        $this->cmsPages = $cmsPages;
    }

    public function getCmsPages()
    {
        $cmsPages = cmsPage::cmsPages();
        return  $cmsPages->latest()->get();
    }
}
