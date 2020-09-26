<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
        //mypageを表示
        public function getMypage(){
            return view('mypage');
          }
    
        //searchを表示
        public function getSearch(){
            return view('search');
          }
    
        //postscreenを表示
        public function getPostscreen(){
            return view('postscreen');
          }
}
