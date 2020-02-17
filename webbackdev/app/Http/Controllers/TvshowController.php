<?php

namespace App\Http\Controllers;

use App\Favouritetvshow;
use Illuminate\Http\Request;
use Validator;

class TvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('tvshow')->with('showlist',Favouritetvshow::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)  {
        $validator = Validator::make($req->all(), [
            'season' => 'required',
            'episode' => 'required',
            'quote' => 'required'
		]);
        
		if ($validator->passes()) {
			$tvshow = new Favouritetvshow();
            $tvshow->season = $req->season;
            $tvshow->episode= $req->episode;
			$tvshow->quote = $req->quote;
			$tvshow->image =  'https://picsum.photos/75/75/?random=' . rand();
			$tvshow->save();
			
			return response()->json( $tvshow);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showedit(Request $req) {
        $data = Favouritetvshow::find ( $req->id );
        $data->season = $req->season;
        $data->episode= $req->episode;
        $data->quote = $req->quote;
        $data->save();
		
        return response ()->json ( $data );        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $req) {
        Favouritetvshow::find($req->id)->delete();

        return response()->json();
    }
}
