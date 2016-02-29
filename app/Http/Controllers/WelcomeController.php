<?php namespace App\Http\Controllers;


use App\Demo;
use App\Card;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
	public function contact()
	{
		return view('contact');
	}

	public function practical()
	{
		/*$name=[
			'jigar','aaa','aa'
		];*/
		$name="jigar <span style='color: #0000C2'>BBBBBB</span>";
		return view('first.home')->with('name',$name);
	}
	public function blog(Request $request,$id)
	{
																																																																																																																																																																																																												var_dump($request);
				/*$name="JIGAR";
		return view('blog',compact('name'));*/
	}


	/*public function show($id)
	{
		$data=Card::find($id);
		return view('cards.show',compact('data'));
	}*/
}
