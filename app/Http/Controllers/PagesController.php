<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class PagesController extends Controller
{
        //mypageを表示
        public function getMypage(){
            return view('mypage');
          }
    
        //searchを表示
        public function getSearch(){
          $destination=null;
            return view('search',compact('destination'));
          }

          public function postSearch(Request $request){
            
            $destination = $request->input('place');//検索ページのキーワードを取得

            //$result = \App\Location::Where('locationName','like','%'+$destination+'%')->first();
            $resultLat = Location::Where('locationName','like',"%$destination%")->value('latitude');
            $resultLon = Location::Where('locationName','like',"%$destination%")->value('longitude');
            $resultName = Location::Where('locationName','like',"%$destination%")->value('locationName');
            
            
            return view('search',compact('resultLat','resultLon','resultName'));
          }
    
        //postscreenを表示
        public function getPostscreen(){
            return view('postscreen');
          }
}
