<?php

namespace controllers;

use services\EmailValidationService;

class CurlController
{
    public function __construct(private EmailValidationService $emailValidationService)
    {
    }

    public function index(): void
    {
        $email = 'cool.deds@mail.ru';
        $result = $this->emailValidationService->verify($email);

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}