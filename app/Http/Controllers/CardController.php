<?php

namespace App\Http\Controllers;
use App\Card;
use App\Card_image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CardsRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    public function index()
    {
        return view('demo.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('demo.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardsRequests $request)
    {
        $post=$request->all();
        //$post['user_id']=Auth::id();
        $card=$this->user->publish(new Card($post));
        flash()->success('Success','Card Inserted SuccessFully');
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //
        return Card::locatedAt($title)->first();
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
        $cardim=Card_image::find($id);
        //$card=Card::find($cardim->cards_id);
        if($cardim->card->user_id!=Auth::id())
        {
            flash()->error('Error',"You Dont Have PermissionTo Delete Image");
            return back();
        }
        $pic=Card_image::find($id);
        $files1="uploads/".$pic->image;
        $files2="uploads/th".$pic->image;
        \File::delete([
            $files1,$files2
        ]);
        $pic->delete();
        return back();
    }

    public function cards()
    {
        $data=Card::all();
        return view('cards.index',compact('data'));
    }

    public function shows($card)
    {
        /*dd($card->notes()->get());
		dd($card->notes);*/
        $card=Card::findOrfail($card);
        return view('cards.show',compact('card'));

    }

    public function addnote(Request $r,Card $card)
    {	/*  1st way
		$n=new Note();
		$n->body=$r->body;
		$card->notes()->save($n)*/;

        // 2nd way
        $card->notes()->create($r->all());
        return back();
    }

    public function addphoto(Request $r,$card)
    {
            $cards=Card::findOrfail($card);
            if($cards->user_id!=Auth::id())
            {
                    if($r->ajax()){
                       return response(['messages'=>'You Dont Have Permission To Upload Pic'],403);
                     }
                     flash()->error('no Way');
                     return back();
            }
            $file=$r->file('file');
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move('uploads/',$filename);
            $path='uploads/'.$filename;
            $th='uploads/'.'th'.$filename;
            $c=Card::locatedAtById($card)->first();
            $c->cardimages()->create(['image' => $filename ]);
            Image::make($path)
                ->fit(200)
                ->save($th);
            return "done";
    }
}
