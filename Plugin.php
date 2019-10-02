<?php
namespace BennoThommo\Meta;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'bennothommo.meta::lang.plugin.name',
            'description' => 'bennothommo.meta::lang.plugin.description',
            'author' => 'Ben Thomson',
            'icon' => 'icon-tags'
        ];
    }

    public function registerComponents()
    {
        return [
            'BennoThommo\Meta\Components\MetaList' => 'metaList',
            'BennoThommo\Meta\Components\LinkList' => 'linkList',
            'BennoThommo\Meta\Components\JsonLdList' => 'jsonLdList'
        ];
    }
}
