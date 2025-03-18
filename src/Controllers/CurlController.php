<?php

declare(strict_types=1);

namespace controllers;

class CurlController
{
    public function index(): void
    {
        $handle = curl_init();

        $url = 'https://example.com';

        curl_setopt($handle, CURLOPT_URL, $url);

        curl_exec($handle);

        curl_close($handle);
    }
}