<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\StoreAds;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->role == 'admin') {
            $ads = Ad::all();
            return view('admin.cpanel.ads', ['ads' => $ads]);
        }
        return view('cpanel.ads');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->ads as $ad) {
            $new_path = $ad->path() . '_';
            $new_name = uniqid() . '.' . $ad->clientExtension();
            rename($ad->path(), $new_path);
            $getID3 = new \getID3;
            $playingtime = $getID3->analyze($new_path);
            event(new StoreAds($new_path, $new_name));
            Ad::create([
              'name' => $ad->getClientOriginalName(),
              'path' => 'ads/' . $new_name,
              'duration' => $playingtime['playtime_string'],
              'size' => $ad->getClientSize(),
              'user_id' => \Auth::user()->id
            ]);
        }

        if ($request->index >= $request->length) {
            return response()->json(['success' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        switch (Auth::user()->role) {
        case 'admin':
          $ad = Ad::findOrFail($id);
          $ad->delete();
          break;
        default:
          $ad = Ad::findOrFail($id);
          if ($ad->user_id == Auth::user()->id) {
              $ad->delete();
          } else {
              abort(401);
          }
          break;
        }
        return back();
    }
    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        if ((\Auth::user()->role == "user") && ($ad->user_id !== \Auth::user()->id)) {
            abort(401);
        }
        \Storage::delete($ad->path);
        $ad->delete();
        return back();
    }
}
