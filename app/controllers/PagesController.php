<?php
namespace App\Controllers;

use App\Core\App;

class PagesController {

    public function home()
    {
        $title = 'Main Page';
        return view('home', ['title'=>$title]);
    }

    public function about()
    {
        $title = 'About Page';
        return view('about', ['title'=>$title]);
    }

    public function contact()
    {
        $title = 'Contact Page';
        return view('contact', ['title'=>$title]);
    }

}