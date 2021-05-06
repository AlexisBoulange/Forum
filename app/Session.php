<?php

namespace App;

session_start();

abstract class Session
{
    public static function getUser()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] !== null) {
            return $_SESSION['user'];
        }
        return false;
    }

    public static function setUser($user)
    {
        $_SESSION['user'] = $user;
    }
    public static function getTopics()
    {
        if (isset($_SESSION['topics']) && $_SESSION['topics'] !== null) {
            return $_SESSION['topics'];
        }
        return false;
    }

    public static function setTopics($topics)
    {
        $_SESSION['topics'] = $topics;
    }

    public static function removeUser()
    {
        if (self::getUser()) {
            unset($_SESSION['user']);
        }
        return;
    }

    public function isAdmin()
    {
    }

    public static function authenticationRequired($roleToHave)
    {
        if (!self::getUser()) {
            Router::redirectTo("security", "login");
        }
    }

    //generer le token de la session pour le comparer à celui du formulaire

    public static function generateKey()
    {
        if (!isset($_SESSION['key']) || $_SESSION['key'] === null) {
            $_SESSION['key'] =  bin2hex(random_bytes(32));
        }
    }

    public static function getKey()
    {
        return $_SESSION['key'];
    }
}
