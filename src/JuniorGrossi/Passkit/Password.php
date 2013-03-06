<?php 

namespace JuniorGrossi\Passkit;

class Password extends PasswordGenerator
{

    public static function check($password)
    {
        return PasswordChecker::check($password);
    }

}

$password = Password::generate(8, array('numbers', 'letters'));
echo $password . "\n";
echo Password::check($password)."\n";