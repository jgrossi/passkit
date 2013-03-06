<?php 

namespace JuniorGrossi\Passkit;

/**
 * Check how much a password is secure, looking some patterns
 * 
 * @author Junior Grossi <me@juniorgrossi.com>
 * @package JuniorGrossi\Passkit
 */
class PasswordChecker
{
    /**
     * The password to be checked
     */
    protected $password;

    /**
     * Static file path. Used for dictionaries and keyboard patterns
     */
    protected $staticFilesPath = '../../../files';

    /**
     * Set the password inside constructor
     */
    public function __construct($password)
    {
        $this->password = $password;
        $this->staticFilesPath = __DIR__ . '/' . $this->staticFilesPath;
    }

    /**
     * Ensure password has at least 8 chars
     * 
     * @return bool
     */
    public function hasMinimalSize()
    {
        return strlen($this->password) >= 8;
    }

    /**
     * Ensure password has uppercase letters
     * 
     * @return bool
     */
    public function hasUppercaseLetters()
    {
        return preg_match('/[A-Z]/', $this->password);
    }

    /**
     * Ensure password has lowercase letters
     * 
     * @return bool;
     */
    public function hasLowercaseLetters()
    {
        return preg_match('/[a-z]/', $this->password);
    }

    /**
     * Ensure password has numbers
     * 
     * @return bool
     */
    public function hasNumbers()
    {
        return preg_match('/[0-9]/', $this->password);
    }

    /**
     * Ensure password has symbols
     * 
     * @return bool
     */
    public function hasSymbols()
    {
        $symbols = PasswordGenerator::$chars['symbols'];
        return strpos($this->password, str_split($symbols)) !== false;
    }

    /**
     * Ensure the password is not a common english word
     * 
     * @return bool
     */
    public function isNotInDictionary($lang)
    {
        $file = static::$staticFilesPath . '/dictionaries/' . $lang;

        if (file_exists($file)) {
            $content = file_get_contents($file);
            return strpos($content, $this->password . "\n") === false;
        }

        return true;
    }

    /**
     * Ensure the password is not a keyboard pattern like "qwert"
     * 
     * @return bool
     */
    public function isNotKeyboardPattern()
    {
        $file = static::$staticFilesPath . '/keyboard_patterns';

        if (file_exists($file)) {
            $lines = file($file);
            
            foreach ($lines as $line) {
                $pattern = '/^' . $line . '$/';
                if (preg_match($pattern, $this->password)) {
                    return false;
                }
            } 

            return true;
        }

        return false;
    }

    /**
     * Check and rank the password
     * 
     * @return int The number of security: 1 is bad, 5 is better
     */
    public static function check($password)
    {
        $instance = new static($password);

        if ($instance->hasMinimalSize()) {
            if ($instance->hasLowercaseLetters() and $instance->hasNumbers()) {
                if ($instance->hasUppercaseLetters()) {
                    if ($instance->hasSymbols()) {
                        return 5;
                    }
                    return 4;
                }
                return 3;
            } elseif ($instance->hasNumbers()) {
                return 2;
            }
            return 1;
        } elseif ($instance->hasLowercaseLetters() and $instance->hasNumbers()) {
            if ($instance->hasUppercaseLetters()) {
                return 3;
            }
            return 2;
        }   
        return 1; 
    }

}

