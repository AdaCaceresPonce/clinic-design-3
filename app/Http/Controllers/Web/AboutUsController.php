<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AboutUsPageContent;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){

        $contents = AboutUsPageContent::first();

        return view('web.about_us', compact('contents'));
    }
}
