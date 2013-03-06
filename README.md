Passkit
=======

Provide a easy way to generate and ranking (check) existing password. This project was created only to test Packagist and create my first Composer project.

## Generating a new password
    
    // Generate a password with 6 chars using numbers, letters (lowercase and uppercase) and symbols
    Password::generate(6);

    // Generate a 8 chars password only with numbers
    Password::generate(8, array('numbers'));

    // Variants
    Password::generate(8, array('numbers', 'letters'));
    Password::generate(8, array('numbers', 'symbols'));
    Password::generate(8, array('numbers', 'letters', 'symbols'));

## Check a password

You can use PasswordChecker class to verify how much is your password secure.
    
    Password::check('1234'); // 1 (bad)
    Password::check('12asDas$8*'); // 5 (great)

    

    