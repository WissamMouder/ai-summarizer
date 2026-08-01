<?php

namespace App\Http\Controllers;

use App\Services\SummarizationService;
use Illuminate\Http\Request;

class SummarizationController extends Controller
{
    protected $summarizationService;

    public function __construct(SummarizationService $summarizationService)
    {
        $this->summarizationService = $summarizationService;
    }

    public function summarize(Request $request)
    {
        try {

            $text = $request->input('text');

            if (!$text) {
                return response()->json([
                    'error' => 'Text is required.'
                ], 400);
            }

            $summary = $this->summarizationService->summarize($text);

            return response()->json([
                'summary' => $summary
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);

        }
    }
}