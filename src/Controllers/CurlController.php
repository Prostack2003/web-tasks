<?php

declare(strict_types=1);

namespace controllers;

class CurlController
{
    public function index(): void
    {
        $handle = curl_init();

        $url = 'https://api.emailable.com/v1/verify?email=cool.deds@mail.ru&api_key=test_37c5b7a0b7ccff58121a';

        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($handle);
            if ($content !== false)
            {
                $data = json_decode($content, true);

                echo "<pre>";
                print_r($data);
            }

    }
}