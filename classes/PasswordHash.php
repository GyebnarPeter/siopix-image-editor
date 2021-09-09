<?php


class PasswordHash
{

    public static function hash($password, $salt = null) {
        if ($salt == null) {
            $salt = openssl_random_pseudo_bytes(16);
        } else {
            $salt = base64_decode($salt);
        }

        $hash = hash_pbkdf2('sha512', $password, $salt, 10000);
        return array('hash' => $hash, 'salt' => base64_encode($salt));
    }

}