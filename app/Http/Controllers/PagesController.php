<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        // This is the home page
        return view('pages.index');
    }
    
    public function about(){
        // This is the home page
        return view('pages.about');
    }
    
    public function contact(){
        // This is the home page
        return view('pages.contact');
    }
    
    public function services(){
        $data = array(
            'page_title' => 'Services',
            'services' => ['Web Design', 'Web Development', 'Mobile App Development']
        );
        // This is the home page
        return view('pages.services')->with($data);
    }
}
