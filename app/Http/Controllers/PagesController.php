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
    $postResults = Favoriteloc::where('id', Auth::id())->get();
    return view('mypage', compact('postResults'));
  }

  //mypageを表示POST画像投稿
  public function postMypage(Request $request)
  {
    $postResults = Favoriteloc::where('id', Auth::id())->get();
    $count = 1;
    $images = $request->file('images');
    dd($images);
    if(count($images) > 3){
      return redirect('mypage')->with('status', '画像は3枚まで選択できます');
    }
    foreach ($images as $img) {
      //dd('favBikeImage'.$count);
    
      $path1 = $img->store('public/img');
      $rePath1 = InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(350, null, function($constraint)
        {
          $constraint->aspectRatio();
        }
        )->save(storage_path('app/public/img/' . basename($path1)));
      User::where('id', Auth::id())
        ->update(
          [
            'favBikeImage'.$count => basename($path1)
          ]
        );
        $count++;
    }
    return view('mypage', compact('postResults'));
  }

  public function deleteMypage()
  {
    dd("OK");
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
    }else if(count($result) == 0){
      return redirect('/')->with('status', '検索結果がありません');
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

  public function postPostscreen(Request $request)
  {
    $all = PostRequest::all();
    
    $images = $request->file('post_images');
    //$images = $all["images"];
    //dd($images);
    
    $count = 0;
    $img_arr = [];
    if(count($images) > 3){
      return redirect('mypage')->with('status', '画像は3枚まで選択できます');
    }
    foreach ($images as $img) {
      //dd('favBikeImage'.$count);
    
      $path1 = $img->store('public/img');
      $rePath1 = InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(320, null, function($constraint)
        {
          $constraint->aspectRatio();
        }
        )->save(storage_path('app/public/img/' . basename($path1)));
            //'favBikeImage'.$count => basename($path1)
            array_push($img_arr, basename($path1));
        //$count++;
    }
    
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
      'images1' => $img_arr[0],
      'images2' => $img_arr[1],
      'images3' => $img_arr[2],
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
    return redirect()->action(
      'PagesController@getPostscreen',
    );
  }

    //postscreenを表示(patch)
  public function patchPostscreen(Request $request)
  {
    $like = $request->input('like');
    //dd($like);
    Favoriteloc::where('favLocID', $like)->increment('rating');
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
    return view('newpost');
  }

  //マイページのユーザー投稿編集画面のget
  public function getPostediting()
  {
    return view('postediting');
  }
}
