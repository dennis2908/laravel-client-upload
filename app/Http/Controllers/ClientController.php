<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    public function register(Request $request)
    {
        $clientId = uniqid('client_');
        Cache::put("client:$clientId:status", 'idle', 3600);
        return response()->json(['client_id' => $clientId]);
    }

    public function requestDownload($clientId)
    {
        Cache::put("client:$clientId:command", 'upload_file', 300);
        Cache::put("client:$clientId:status", 'waiting', 300);
        return response()->json(['message' => "Requested file from $clientId"]);
    }

    public function uploadFile(Request $request, $clientId)
    {
        $file = $request->file('file');
        $path = $file->storeAs('client_uploads', $clientId . '_' . time() . '.txt');
        Cache::put("client:$clientId:status", 'completed', 600);
        return response()->json(['message' => 'File received', 'path' => $path]);
    }

    public function status($clientId)
    {
        return response()->json([
            'status' => Cache::get("client:$clientId:status", 'unknown'),
            'command' => Cache::get("client:$clientId:command", null)
        ]);
    }
}
