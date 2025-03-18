<?php

namespace services;

class EmailValidationService
{
    private string $baseUrl = 'https://api.emailable.com/v1/';
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function verify(string $email): array
    {
        $handle = curl_init();

        $url = $this->baseUrl . 'verify?email=' . urlencode($email) . '&api_key=' . $this->apiKey;

        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($handle);

        if ($content === false) {
            $error = curl_error($handle);
            curl_close($handle);
            throw new \RuntimeException("Ошибка cURL: " . $error);
        }

        curl_close($handle);

        return json_decode($content, true);
    }
}