<?php

namespace controllers;

class PageController
{
    public function home(): void
    {
        require __DIR__ . "/../views/main.php";
    }

    public function login(): void
    {
        include __DIR__ . "/../views/login.php";
    }

    public function register(): void
    {
        include __DIR__ . "/../views/register.php";
    }
}