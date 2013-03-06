<?php 

namespace JuniorGrossi\Passkit;

class Password extends PasswordGenerator
{

    public static function check($password)
    {
        return PasswordChecker::check($password);
    }

}

