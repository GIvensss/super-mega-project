<?php

namespace Framework\Session;

class Session
{
    private bool $isStarted = false;

    public static function setName($name): void
    {
        session_name($name);
    }

    public static function getName(): string
    {
        return session_name();
    }

    public static function setId($id): void
    {
        session_id($id);
    }

    public static function getId(): string
    {
        return session_id();
    }


    public static function sessionExist(): bool
    {
        if (session_id() == '' || session_status()) {
            return false;
        } else {
            return true;
        }
    }

    public static function start(): void
    {
        session_start();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function setSavePath($savePath)
    {
        session_save_path($savePath);
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }

    public static function contains($key): bool
    {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
