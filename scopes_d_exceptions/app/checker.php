<?php

namespace SHD;
use SHD\Exception;

class Checker
{
    public function checkPalindrome($text){
        $text = preg_replace('/[^A-Za-z0-9]/', '', $text);
        $text = strtolower($text);
        $before = $text;
        $after = strrev($text);
        try {
            if ($before == $after){
                echo "Wow, you can read this text correctly from both ways";
            } else {
                throw new palindromeException("Not a valid palindrome", 4);
            }
        } catch (palindromeException $e) {
            echo $e->showError();
        }
        
    }
}


?>