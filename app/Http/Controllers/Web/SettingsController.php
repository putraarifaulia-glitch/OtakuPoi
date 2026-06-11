<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        return view('pages.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,id,ja',
            'theme' => 'required|in:light,dark',
        ]);

        Session::put('language', $request->language);
        Session::put('theme', $request->theme);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
