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

## Demo

You can see it in action.

### Generating passwords

- [http://passkit.juniorgrossi.com/generate](http://passkit.juniorgrossi.com/generate)
- [http://passkit.juniorgrossi.com/generate?length=20](http://passkit.juniorgrossi.com/generate?length=20)
- [http://passkit.juniorgrossi.com/generate?length=15&using=letters](http://passkit.juniorgrossi.com/generate?length=15&using=letters)
- [http://passkit.juniorgrossi.com/generate?length=15&using=letters,numbers,symbols](http://passkit.juniorgrossi.com/generate?length=15&using=letters,numbers,symbols)

### Checking

- [http://passkit.juniorgrossi.com/check?password=12345](http://passkit.juniorgrossi.com/check?password=12345)
- [http://passkit.juniorgrossi.com/check?password=123Apsu793jGH](http://passkit.juniorgrossi.com/check?password=123Apsu793jGH)
- [http://passkit.juniorgrossi.com/check?password=ija9H76h*a#](http://passkit.juniorgrossi.com/check?password=ija9H76h*a#)

    

    