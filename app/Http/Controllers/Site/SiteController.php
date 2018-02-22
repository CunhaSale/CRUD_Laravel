<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

	public function __construct(){
		//$this->middleware('auth')->only(['contato', 'categoria']);
	}

    public function index(){
        $title = 'Home Page';
        $linguagem = 'JavaScript';
        $cidades = ['Salé', 'biritiba', 'suzano', 'mogi'];
    	return view('site.home.index', compact('title', 'linguagem', 'cidades'));
    }
}
