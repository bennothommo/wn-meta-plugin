<?php
namespace BennoThommo\Meta\Components;

use Cms\Classes\ComponentBase;
use BennoThommo\Meta\Link;

class LinkList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'bennothommo.meta::lang.components.linkList.name',
            'description' => 'bennothommo.meta::lang.components.linkList.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'escape' => [
                'title' => 'bennothommo.meta::lang.components.linkList.escape.title',
                'description' => 'bennothommo.meta::lang.components.linkList.escape.description',
                'default' => true,
                'type' => 'checkbox'
            ]
        ];
    }

    public function tags()
    {
        return Link::all();
    }
}
