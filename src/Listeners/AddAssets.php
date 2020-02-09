<?php
namespace ZerosOnesFun\LinkDecisions\Listeners;

use Flarum\Frontend\Document;
use Flarum\Http\UrlGenerator;

class AddAssets
{
    /**
     * @param Document $document
     */
    public function __invoke(Document $document)
    {
        $this->assets($document);
    }

    private function assets(Document &$document)
    {
        $extensionFolder = '/zerosonesfun-link-decisions';
        $urlGenerator = app()->make(UrlGenerator::class);

        $cssLocation = $extensionFolder.'/sweetalert.min.css';
        $document->css[] = $urlGenerator->to('forum')->path('assets/extensions'.$cssLocation);

        $jsLocation = $extensionFolder.'/sweetalert.min.js';
        $document->js[] = $urlGenerator->to('forum')->path('assets/extensions'.$jsLocation);
    }
}
