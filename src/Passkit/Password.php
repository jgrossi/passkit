<?php 

namespace Passkit;

/**
 * Wrapper for PasswordGenerator and PasswordChecker classes
 * 
 * @author Junior Grossi <me@juniorgrossi.com>
 * @package JuniorGrossi\Passkit
 */
class Password extends PasswordGenerator
{

    /**
     * Wrapper for PasswordChecker::check method
     * 
     * @param $password string
     * @return int
     */
    public static function check($password)
    {
        return PasswordChecker::check($password);
    }

}

