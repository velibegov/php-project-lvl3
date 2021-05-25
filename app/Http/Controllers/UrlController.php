<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url|max:255'
        ]);
        $scheme = parse_url($validated['url'], PHP_URL_SCHEME);
        $host = parse_url($validated['url'], PHP_URL_HOST);
        $url = $scheme . '://' . $host;
        $updatedAt = Carbon::now()->toDateTime();
        $createdAt = Carbon::now()->toDateTime();

        if ($this->isSiteInDB($url)) {
            $request->session()->now('success', 'Site is already verified');
            return view('show', compact('url'));
        } else {
            $id = DB::table('urls')->insertGetId([
                'name' => $url,
                'updated_at' => $updatedAt,
                'created_at' => $createdAt
            ]);
            $added = DB::table('urls')->where('id', '=', $id)->get();
            $request->session()->now('success', 'Site added!');
            return view('show', ['url' => $added]);
        }
    }

    public function show($id)
    {
        $url = DB::table('urls')->where('id', '=', $id)->get();
        return view('show', compact('url'));
    }

    public function index()
    {
        return view('index', ['urls' => DB::table('urls')->paginate(10)]);
    }

    public function isSiteInDB($site): bool
    {
        $id = DB::table('urls')->where('name', $site)->value('id');
        return isset($id);
    }

    public function formShow()
    {
        return view('create');
    }
}
