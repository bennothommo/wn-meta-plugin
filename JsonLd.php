<?php
namespace BennoThommo\Meta;

use October\Rain\Exception\ApplicationException;

class JsonLd
{
    private static $blocks = [];

    public static function get(string $name)
    {
        return self::$blocks[$name] ?? null;
    }

    public static function set($name, string $value = '')
    {
        if (is_array($name)) {
            foreach ($name as $metaName => $metaValue) {
                self::set($metaName, (string) $metaValue);
            }
        } else {
            // Ensure value is valid JSON
            $json = json_decode($value, true);
            $errorCode = json_last_error();

            if ($errorCode !== JSON_ERROR_NONE) {
                throw new ApplicationException(
                    'The data provided for JSON-LD block "' . $name . '" is invalid JSON: ' .
                    self::getMessage($errorCode)
                );
            }

            self::$blocks[$name] = $value;
        }
    }

    public static function all()
    {
        return self::$blocks;
    }

    protected static function getMessage(int $errorCode)
    {
        switch ($errorCode) {
            case JSON_ERROR_DEPTH:
                return 'The maximum stack depth has been exceeded.';
            case JSON_ERROR_STATE_MISMATCH:
                return 'Invalid or malformed JSON.';
            case JSON_ERROR_CTRL_CHAR:
                return 'Control character error, possibly incorrectly encoded.';
            case JSON_ERROR_SYNTAX:
                return 'Syntax error.';
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded.';
            case JSON_ERROR_RECURSION:
                return 'One or more recursive references in the value to be encoded.';
            case JSON_ERROR_INF_OR_NAN:
                return 'One or more NAN or INF values in the value to be encoded.';
            case JSON_ERROR_UNSUPPORTED_TYPE:
                return 'A value of a type that cannot be encoded was given.';
            case JSON_ERROR_INVALID_PROPERTY_NAME:
                return 'A property name that cannot be encoded was given.';
            case JSON_ERROR_UTF16:
                return 'Malformed UTF-16 characters, possibly incorrectly encoded.';
            default:
                return 'Unknown error.';
        }
    }
}
