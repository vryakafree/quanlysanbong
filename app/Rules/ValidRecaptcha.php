<?php

namespace App\Rules;

use http\Client;
use Illuminate\Contracts\Validation\Rule;

class ValidRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Khởi tạo http client
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);

        // Gửi dữ liệu đến cho google recaptcha xử lý
        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $value
            ]
        ]);

        // Google reCaptcha trả về kết quả đúng/sai
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // Message thông báo khi kết quả trả về là sai
        return 'ReCaptcha verification failed.';
    }
}
