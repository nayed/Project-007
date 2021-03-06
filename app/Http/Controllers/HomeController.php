<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Media;
use App\Category;
use App\Info;
use App\Note;
use Input;
use Validator;
use Redirect;
use Auth;
use DB;
use Storage;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
       // $lesson = Lesson::where('user_id', $request->user()->id)->get()->medias;
        if (Auth::user()->group_id != 1){
            $lessons = Lesson::where('category_id', Auth::user()->category_id)->get();
            $infos = Info::all();
            $notes = Note::where('user_id',Auth::user()->id)->get();
        }else{
            $lessons = Lesson::all();
            $infos = Info::all();
            $notes = Note::where('user_id',Auth::user()->id)->get();
        }
       
 
        return view('home.index', compact('lessons', 'infos','notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('home.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
