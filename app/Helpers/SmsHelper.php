<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class SmsHelper
{
    public static function sendSms($to, $message)
    {
        $apiToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiODjhiYjE3YzI0MzYwNTU1YThjZDBiMzg1ZmJlZjQxNWY3NTJiZTljZTRlN2MzMjI1ODIwOGI5YjcxOTYiLCJpYXQiOjE3MjM1NDY3NDYuODY5MTk3LCJuYmYiOjE3MjM1NDY3NDYuODY5MjAyLCJleHAiOjIwMzkwNzk1NDYuODY0Mzk4LCJzdWIiOiI4MSIsInNjb3BlcyI6W119.d70JimcomBkExRAWTuHGa7qq93qf1x-1MMuhkk0OLTlGvkzk_Lu7hoixul8qpIM0Dj3GceOJihrYHXVmthIP1IdXmMTrYfwCyXOFKuBONZOeuoWhQXVut7nSoSEUxI422tGjDejM6WbW9GPjDTykjuA9oz_mn48s_U44ODpGajNAdVxAX7aR7TKpyPC_8o45s873m_v0GSer1scuBKy3zsuaThZ7QddfQ3GLJ7k0dLyA2vhyjMU8pCH9_-DyirqPssMy6SM7VYbhTLjZwo6CbpkRCYwhiu3mdxqwuRAMTj2mMKdAJMamgbIOn35IvSH_A5wC4cVfBReQsCnypoQXMFftxff76pm9zQa9XvO7rOzCK2EA-tLWXwDZjsR4JYBSgRnjVqqXHN8Zpsiyy5ZpLWYHL5lORYT3EotkGgGxXmyIATd_R5-SjMf1UTECMG-32YSvN5y2gbsl_ANmZMQMC_6AUJfFTsbyug20ilIftnI5GtMFzO9Rw0ZhucwiyFiH91mW7G9VLM6B7-9FoTPwDRkCgw03knOt6dMFvy1u3vXyk-H4M9uqWHwDZWdZfDddLJ6DNhtBcQHv1fHacHYu806-c2HaTYjG4COXIBWj1lQ5NYnULJrWciUdFxfOPuh4q2Jj7fe9lHYXzcpGs_uqrNhZn-PH4Rju3eetPJnRm3M'; // truncated
        $url = 'https://newsms.doit.gov.np/api/sms';

        $payload = [
            'from' => 'no-reply',
            'to'   => $to,
            'text' => $message,
        ];

        $response = Http::withToken($apiToken)->post($url, $payload);

        if (!$response->successful()) {
            throw new \Exception('SMS sending failed: ' . $response->body());
        }

        return $response->json();
    }
}
