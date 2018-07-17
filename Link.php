<?php
namespace BennoThommo\Meta;

class Link
{
    private static $tags = [];

    public static function get(string $name)
    {
        return self::$tags[$name] ?? null;
    }

    public static function set($name, string $value = '')
    {
        if (is_array($name)) {
            foreach ($name as $linkName => $linkValue) {
                self::set($linkName, (string) $linkValue);
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
