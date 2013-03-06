Passkit
=======

Provide a easy way to generate and ranking (check) existing password. This project was created only to test Packagist and create my first Composer project.

## Generating a new password
    
    // Generate a password with 6 chars using numbers, letters (lowercase and uppercase) and symbols
    Passkit\Password::generate(6);

    // Generate a 8 chars password only with numbers
    Passkit\Password::generate(8, array('numbers'));

    // Variants
    Passkit\Password::generate(8, array('numbers', 'letters'));
    Passkit\Password::generate(8, array('numbers', 'symbols'));
    Passkit\Password::generate(8, array('numbers', 'letters', 'symbols'));

## Check a password

You can use PasswordChecker class to verify how much is your password secure.
    
    Passkit\Password::check('1234'); // 1 (bad)
    Passkit\Password::check('12asDas$8*'); // 5 (great)

    

    