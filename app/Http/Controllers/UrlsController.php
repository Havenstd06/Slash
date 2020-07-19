<?php

namespace App\Http\Controllers;

use App\Url;

class UrlsController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function shortenLink(Url $url)
    {
        return redirect($url->original_url);
    }
}
