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
    public function show()
    {
        $contents = [
            'about_us_title' => 'Título de Nosotros',
            'about_us_description' => 'Descripción de Nosotros',
            'free_title_1' => 'Título Libre 1',
            'free_description_1'=>'titulo libre por descripcion',
            'free_title_2'=> 'Título 2' ,
            'free_description_2'=>'Título por descripcion 2'
            // otras claves y valores
        ];

        return view('web.about_us', compact('contents'));
    }


}
