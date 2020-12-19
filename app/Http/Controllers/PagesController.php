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
use Illuminate\Support\Facades\Storage;

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
    $all = PostRequest::all();
    //URLからfavLocIDの取得
    (int)$urlID = preg_replace('/[^0-9]/', '', url()->previous());
    
    $spotID = Location::where('locationName', $all["Spotname"])
    ->select('locationID')
    ->get()
    ->toArray();

    if(empty($spotID)) {
      Temporarily::updateOrInsert(
        ['favLocID' => $urlID], 
        ['name' => $all["Spotname"], 'updated_at' => now()]
      );

      $spotID = [["locationID" => 1]]; 
    }

    //dd($spotID);

    Favoriteloc::where('favLocID', $urlID)->update(
      [
        'title' => $all["Title"],
        'locationID' => $spotID[0]["locationID"],
        'comment' => $all["Sentence"]
      ]
    );
    
    $upImage1 = $request->file('upImage1');
    $upImage2 = $request->file('upImage2');
    $upImage3 = $request->file('upImage3');
    /*
    if(isset($upImage1)) {
      $path1 = $upImage1->store('public/img');
      InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(350, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save(storage_path('app/public/img/' . basename($path1)));

      Favoriteloc::where('favLocID', $urlID)->update(
        [
          'images1' => basename($path1)
        ]
      );
    }
    */

    for($i = 1; $i <= 3; $i++) {
      if(array_key_exists('select' . $i, $all)) {
        $imgName = Favoriteloc::where('favLocID', (int)$urlID)->select('images' . $i)->get()->toArray();
        Storage::delete('public/img/' . $imgName[0]['images' . $i]);
        Favoriteloc::where('favLocID', $urlID)->update(
          [
            'images' . $i => null
          ]
        );
      }
      
      if(isset(${'upImage' . $i})) {
        $imgName = Favoriteloc::where('favLocID', (int)$urlID)->select('images' . $i)->get()->toArray();
        Storage::delete('public/img/' . $imgName[0]['images' . $i]);
        $path = ${'upImage' . $i}->store('public/img');
        InterventionImage::make(storage_path('app/public/img/' . basename($path)))->resize(350, null, function ($constraint) {
          $constraint->aspectRatio();
        })->save(storage_path('app/public/img/' . basename($path)));
  
        Favoriteloc::where('favLocID', $urlID)->update(
          [
            'images' . $i => basename($path)
          ]
        );
      }
    }
    
    return redirect()->action(
      'PagesController@getMypage',
    );
  }

  public function deleteMypage(Request $request)
  {
    $fli = $request->input('fli');
    $locId = Favoriteloc::where('favLocID', $fli)->value('locationID');
    if ($locId == 1) {
      Temporarily::where('favLocID', $fli)->delete();
    }
    Favoriteloc::where('favLocID', $fli)->delete();
    return redirect()->action(
      'PagesController@getMypage',
    );
  }

  public function putMypage(Request $request)
  {
    $all = PostRequest::all();

    if (!isset($all["name"]) && !isset($all["email"])) {
      return redirect('mypage')->with('status', '名前とメールアドレスの入力は必須です');
    }

    if (isset($all["name"])) {
      $name = $all["name"];
    } else {
      $name = Auth::user()->name;
      return redirect('mypage')->with('status', '名前の入力は必須です');
    }

    if (isset($all["email"])) {
      $email = $all["email"];
    } else {
      $email = Auth::user()->email;
      return redirect('mypage')->with('status', 'メールアドレスの入力は必須です');
    }

    $bikeName = $all["bikeName"];

    $image = $request->file('image');
    /*
    \Debugbar::info('$name=' . $name);
    \Debugbar::info('$email=' . $email);
    \Debugbar::info('$bikeName=' . $bikeName);
    dd($image);
    */
    if (isset($image)) {
      $path1 = $image->store('public/img');
      InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(350, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save(storage_path('app/public/img/' . basename($path1)));
    } else {
      $path1 = Auth::user()->favBikeImage1;
    }
    User::where('id', Auth::id())->update(
      [
        'name' => $name,
        'email' => $email,
        'bikeName' => $bikeName,
        'favBikeImage1' => basename($path1)
      ]
    );
    return redirect()->action(
      'PagesController@getMypage',
    );
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
    } else if (count($result) == 0) {
      return redirect('/')->with('status', '検索結果がありません');
    } else {
      return view('search', compact("result"));
    }
  }


  //postscreenを表示
  public function getPostscreen()
  {
    $postResults = Favoriteloc::select(
      'favoritelocs.created_at',
      'favoritelocs.images1',
      'favoritelocs.created_at',
      'favoritelocs.title',
      'favoritelocs.comment',
      'favoritelocs.favLocID',
      'favoritelocs.rating',
      'users.name',
      'locations.locationName',
      'temporarilies.name as tmpName'
    )
      ->join('users', 'favoritelocs.id', '=', 'users.id')
      ->join('locations', 'favoritelocs.locationID', '=', 'locations.locationID')
      ->leftJoin('temporarilies', 'favoritelocs.favLocID', '=', 'temporarilies.favLocID')
      ->orderBy('favLocID', 'desc')
      ->get();
    //dd($postResults);
    return view('postscreen', compact('postResults'));
  }

  public function postPostscreen(Request $request)
  {
    //http://placehold.jp/320x240.png?text=NO%20IMAGE
    $all = PostRequest::all();
    $images = $request->file('post_images');
    //$images = $all["images"];
    //dd($images);

    if (isset($images)) {
      $img_arr = [];
      if (count($images) > 3) {
        return redirect('newpost')->with('status', '画像は3枚まで選択できます');
      }
      foreach ($images as $img) {
        //dd('favBikeImage'.$count);

        $path1 = $img->store('public/img');
        $rePath1 = InterventionImage::make(storage_path('app/public/img/' . basename($path1)))->resize(320, null, function ($constraint) {
          $constraint->aspectRatio();
        })->save(storage_path('app/public/img/' . basename($path1)));
        //'favBikeImage'.$count => basename($path1)
        array_push($img_arr, basename($path1));
        //$count++;
      }

      if (count($img_arr) < 3) {
        for ($i = 3; $i >= count($img_arr); $i--) {
          array_push($img_arr, null);
        }
      }
    } else {
      $img_arr = [null, null, null];
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

    $lastFavlocID = Favoriteloc::where('id', Auth::id())->orderBy('favLocID', 'desc')->value('favLocID');
    if (count($result) == 0) {
      Temporarily::insert([
        'favLocID' => $lastFavlocID,
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
    if(Auth::check()){
      return view('newpost');
    }else {
      return redirect('login');
    }
  }

  public function postNewpost(Request $request)
  {
    return view('newpost');
  }

  //detailspageを表示
  public function getDetailspage($id)
  {
    $fli = $id;
    $results = Favoriteloc::Where('favLocID', $fli)->get();
    //dd($results);
    return view('detailspage', compact('results'));
  }

  //マイページのユーザー投稿編集画面のpost
  public function postPostediting($id)
  {
    //dd("OK");
    $fli = $id;
    /*
    $results = Favoriteloc::Where('favLocID', $fli)
    ->join('locations', 'favoritelocs.locationID', '=', 'locations.locationID')
    ->get();
    //dd($result);
    */
    /*
    $results = Favoriteloc::join('locations', 'favoritelocs.locationID', '=', 'locations.locationID')
    ->leftJoin('temporarilies', function($join) {
      $join->on('favolitelocs.favLocID', '=', 'temporarilies.favLocID')
      ->where('favoritelocs.favLocID', $fli);
    })
    ->get();
    */

    $results = Favoriteloc::select(
      'favoritelocs.title',
      'favoritelocs.locationID',
      'temporarilies.name',
      'locations.locationName',
      'favoritelocs.comment',
      'favoritelocs.images1',
      'favoritelocs.images2',
      'favoritelocs.images3'
    )
    ->join('locations', 'favoritelocs.locationID', '=', 'locations.locationID')
    ->leftJoin('temporarilies', 'favoritelocs.favLocID', '=', 'temporarilies.favLocID')
    ->where('favoritelocs.favLocID', $fli)
    ->get();

    //dd($results);

    return view('postediting', compact('results'));
  }
}
