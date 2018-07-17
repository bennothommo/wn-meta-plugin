<?php
namespace BennoThommo\Meta;

class Meta
{
    private static $tags = [];

    public static function get(string $name)
    {
        return self::$tags[$name] ?? null;
    }

    public static function set($name, string $value = '')
    {
        if (is_array($name)) {
            foreach ($name as $metaName => $metaValue) {
                self::set($metaName, (string) $metaValue);
            }
        } else {
            self::$tags[$name] = $value;
        }
    }

    public static function all()
    {
        return self::$tags;
    }
}
