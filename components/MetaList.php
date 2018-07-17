<?php
namespace BennoThommo\Meta\Components;

use Cms\Classes\ComponentBase;
use BennoThommo\Meta\Meta;

class MetaList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'bennothommo.meta::lang.components.metaList.name',
            'description' => 'bennothommo.meta::lang.components.metaList.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'includePageMeta' => [
                'title' => 'bennothommo.meta::lang.components.metaList.includePageMeta.title',
                'description' => 'bennothommo.meta::lang.components.metaList.includePageMeta.description',
                'default' => true,
                'type' => 'checkbox'
            ],
            'escape' => [
                'title' => 'bennothommo.meta::lang.components.metaList.escape.title',
                'description' => 'bennothommo.meta::lang.components.metaList.escape.description',
                'default' => true,
                'type' => 'checkbox'
            ]
        ];
    }

    public function tags()
    {
        $includePageMeta = boolval($this->property('includePageMeta'));

        if ($includePageMeta && isset($this->page)) {
            Meta::set([
                'title' => $this->page->meta_title,
                'description' => $this->page->meta_description
            ]);
        }

        return Meta::all();
    }
}
