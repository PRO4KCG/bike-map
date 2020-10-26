<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;
use \InterventionImage;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

  public function getIndex() {
    $topResult = Location::get()->toArray();
    return view('welcome',compact('topResult'));
  }

  //mypageを表示
  public function getMypage(){
    return view('mypage');
  }

  //mypageを表示POST画像投稿
  public function postMypage(Request $request){
    $path1 = $request->file('image1_file')->store('public/img');
    $path2 = $request->file('image2_file')->store('public/img');
    $path3 = $request->file('image3_file')->store('public/img');
    $rePath1 = InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(350, 350)->save(storage_path('app/public/img/' . basename($path1)));
    $repath2 = InterventionImage::make(storage_path('app/public/img/' . basename($path2)))->resize(350, 350)->save(storage_path('app/public/img/' . basename($path2)));
    $repath3 = InterventionImage::make(storage_path('app/public/img/' . basename($path3)))->resize(350, 350)->save(storage_path('app/public/img/' . basename($path3)));
    User::where('id', Auth::id())
      ->update(
        [
          'favBikeImage1' => basename($path1),
          'favBikeImage2' => basename($path2),
          'favBikeImage3' => basename($path3)
        ]
      );
    //$results = User::find(2);
    return view('mypage');
  }

  public function getSearch($id) {
    $result = Location::Where('locationID', $id)->get()->toArray();
    //dd($result);
    return view('search',compact("result"));
  }

  public function postSearch(Request $request){
            
    $destination = $request->input('place');//検索ページのキーワードを取得

    //$result = \App\Location::Where('locationName','like','%'+$destination+'%')->first();
    $result = Location::Where('locationName','like',"%$destination%")->get()->toArray();
    //$resultLon = Location::Where('locationName','like',"%$destination%")->get('longitude');
    //$resultName = Location::Where('locationName','like',"%$destination%")->get('locationName');
    //dd($result);
            
    return view('search',compact("result"));
  }
    
  //postscreenを表示
  public function getPostscreen(){
   return view('postscreen');
  }

}
