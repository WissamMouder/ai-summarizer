<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SummarizationService
{
    public function summarize(string $text): string
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Summarize the following text in exactly 20 words: ' . $text,
                ],
            ],
        ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json()['choices'][0]['message']['content'];
    }
}