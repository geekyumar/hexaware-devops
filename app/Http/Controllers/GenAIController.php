<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class GenAIController extends Controller
{
    public function generateSummary(Request $request){
        $client = new Client();
        $key = env('GEMINI_API_KEY');

        $prompt = 'I just want you to directly give a summary for a job application who is a web developer and has some good portfolio. generate only the summary part and nothing else. it should be a summary to be shown to a job recruiter about the candidate.';

        try {
            $response = $client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=$key", [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            ]);

            // Get the response body and convert it to an array
            $data = json_decode($response->getBody()->getContents(), true);
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No text found';

            return response()->json(['data' => $text]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
