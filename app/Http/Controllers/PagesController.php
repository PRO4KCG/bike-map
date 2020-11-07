<?php

namespace App\Http\Controllers;

use Request as PostRequest;
use Illuminate\Http\Request;
use App\Location;
use App\User;
use App\Favoriteloc;
use App\Temporarily;
use \InterventionImage;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

  public function getIndex()
  {
    $topResult = Location::get()->toArray();
    return view('welcome', compact('topResult'));
  }

  //mypageを表示
  public function getMypage()
  {
    return view('mypage');
  }

  //mypageを表示POST画像投稿
  public function postMypage(Request $request)
  {
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

  public function getSearch($id)
  {
    $result = Location::Where('locationID', $id)->get()->toArray();
    //dd($result);
    return view('search', compact("result"));
  }

  public function postSearch(Request $request)
  {

    $destination = $request->input('place'); //検索ページのキーワードを取得
    $result = Location::Where('locationName', 'like', "%$destination%")->get()->toArray();
    if (count($result) == 1) { //検索結果が一つの時はsearchOneに飛ばす
      //return redirect('/');
      return redirect()->action(
        'PagesController@getSearch',
        ['id' => $result[0]['locationID']]
      );
    } else {
      return view('search', compact("result"));
    }
  }


  //postscreenを表示
  public function getPostscreen()
  {
    $postResults = Favoriteloc::get();
    return view('postscreen', compact('postResults'));
  }

  //mailを表示
  public function getMail()
  {
    return view('mail');
  }

  //newpostを表示
  public function getNewpost()
  {
    return view('newpost');
  }

  public function postNewpost(Request $request)
  {
    $all = PostRequest::all();
    //dd($all);
    //dd($all["Title"]);

    $result = Location::Where('locationName', $all["Spotname"])->get()->toArray();
    if (count($result) == 0) {
      $locId = 1;
    } else {
      $locId = $result[0]["locationID"];
    }

    Favoriteloc::insert([
      'id' => Auth::id(),
      'locationID' => $locId,
      'title' => $all["Title"],
      'comment' => $all["Sentence"],
      'created_at' => now(),
      'updated_at' => now()
    ]);

    if (count($result) == 0) {
      Temporarily::insert([
        'favLocID' => FavoriteLoc::count(),
        'name' => $all["Spotname"],
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
    return view('newpost');
  }
}
