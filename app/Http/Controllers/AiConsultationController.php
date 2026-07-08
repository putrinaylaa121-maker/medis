<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiConsultationController extends Controller
{
    // 1. Menampilkan halaman chat AI
    public function index()
    {
        return view('staff.tanya-medis'); // Sesuaikan dengan letak view/blade kalian
    }

    // 2. Process mengirim pesan ke AI Gemini dan menerima balasannya
    public function ask(Request $request)
    {
        // Validasi input pesan agar tidak kosong
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');

        // Batasi topik agar AI hanya menjawab seputar medis/kesehatan
        $systemInstruction = "Kamu adalah asisten virtual medis yang ramah dan profesional. Jawablah pertanyaan pasien dengan bahasa Indonesia yang baik, informatif, dan berikan saran umum. Selalu ingatkan bahwa ini bukan diagnosis medis final dan sarankan untuk tetap berkonsultasi langsung dengan dokter.";

        // Endpoint API Google Gemini (Model flash terbaru)
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}";

        try {
            // Mengirim request ke API Google Gemini
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [['text' => $systemInstruction . "\n\nPasien bertanya: " . $userMessage]]
                    ]
                ]
            ]);
            
            // LOG sementara untuk debug — bisa dihapus nanti kalau sudah stabil
            Log::info('Gemini status: ' . $response->status());
            Log::info('Gemini body: ' . $response->body());

            // FIX: gunakan dot notation ('candidates.0...'), bukan bracket notation ('candidates[0]...')
            // karena method json() dari Laravel HTTP client tidak mendukung bracket notation
            $aiReply = $response->json('candidates.0.content.parts.0.text');

            if ($aiReply) {
                return response()->json(['success' => true, 'reply' => $aiReply]);
            } else {
                Log::error('Gemini API Error Response: ' . json_encode($response->json()));
                return response()->json(['success' => false, 'reply' => 'Maaf, asisten sedang mengalami kendala jaringan.'], 500);
            }

        } catch (\Exception $e) {
            Log::error('Gemini API Exception: ' . $e->getMessage());
            return response()->json(['success' => false, 'reply' => 'Maaf, terjadi kesalahan pada sistem AI.'], 500);
        }
    }
}