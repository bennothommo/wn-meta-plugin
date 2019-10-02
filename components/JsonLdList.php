<?php
namespace BennoThommo\Meta\Components;

use Cms\Classes\ComponentBase;
use BennoThommo\Meta\JsonLd;

class JsonLdList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'bennothommo.meta::lang.components.jsonLdList.name',
            'description' => 'bennothommo.meta::lang.components.jsonLdList.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'escape' => [
                'title' => 'bennothommo.meta::lang.components.jsonLdList.escape.title',
                'description' => 'bennothommo.meta::lang.components.jsonLdList.escape.description',
                'default' => true,
                'type' => 'checkbox'
            ]
        ];
    }

    public function blocks()
    {
        return JsonLd::all();
    }
}
