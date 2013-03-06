<?php 

namespace Passkit;

/**
 * Generate a new password
 * 
 * @author Junior Grossi <me@juniorgrossi.com>
 * @package JuniorGrossi\Passkit
 */
class PasswordGenerator
{
    /**
     * Set the chars grouped by type
     */
    public static $chars = array(
        'letters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'numbers' => '0123456789',
        'symbols' => '`!"?$%^&*()_-+={[}]:;@\'~#|\<,>./;',
    );

    /**
     * Generates a new password
     * 
     * @param $length int
     * @param $using array The array values can be 'numbers', 'letters' and 'symbols'
     * @return string
     */
    public static function generate($length = 8, array $using = null)
    {
        $instance = new static;

        if (empty($using)) {
            $using = array('letters', 'numbers', 'symbols');
        }

        $allowed_chars = $instance->getAllowedChars($using);
        $password = '';

        foreach (range(1, $length) as $step) {
            $random_position = rand(0, strlen($allowed_chars) - 1);
            $password .= $allowed_chars[$random_position];
        }

        return $password;
    }

    /**
     * Get chars for each value passed inside '$using' param inside 'generate' method
     * 
     * @param $allowed array
     * @return string
     */
    protected function getAllowedChars($allowed)
    {
        $max_length = strlen(static::$chars['letters']);
        $string = '';

        foreach ($allowed as $type) {
            if (array_key_exists($type, static::$chars)) {
                $chars = static::$chars[$type];
                $string .= str_pad($chars, $max_length, $chars);
            }
        }

        return $string;
    }

}

