<?php

class ListwordController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{ //Perform search
		
		$word=Input::get('word');
		// echo $wordresult = Listword::with('wordinfo')->get($word);

		
		$count='1'; //List same words numerically
		$wordresult= DB::table('wordinfos')
		->join('listwords', 'listwords.id', '=', 'wordinfos.id')
		->select('listwords.words', 'wordinfos.definition', 'wordinfos.parts_of_speech')
		->where('words','=' ,$word)->get();
		if((empty($wordresult))AND (!empty($_GET))){

			Session::flash('message', 'Word was not found');
		}
		else
		{
			Session::flush();
		}

// if((empty($_GET)) AND (ISSET($_GET))){
//  Redirect::to('listwords');
// }
//return result to the view index
		return View::make('listwords.index')
		->with('wordresult', $wordresult)->with('count',$count);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load the form to add words
		return View::make('listwords.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		// validating
		
		$rules = array(
			'word'       => 'required|alpha',
			'definition'      => 'required|alpha',
			'part_of_speech' => 'required|alpha'
			);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('listwords/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {
			// store listword
			$listword = new Listword;
			$listword->words = Input::get('word');

			$listword ->save();
			// store wordinfo
			$wordinfo = new Wordinfo;
			$wordinfo->definition = Input::get('definition');
			$wordinfo->parts_of_speech = Input::get('part_of_speech');
			
			$wordinfo ->save();
			// redirect
			Session::flash('message', 'Word successfully added');
			return Redirect::to('listwords/show');
		}
	}
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function edit($id)
{
		// get the word
	$word = Listword::with('wordinfo')->find($id);

		// show the edit form and pass the word
	return View::make('listwords.edit')
	->with('word', $word);
}



/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function update($id)
{
		// validate
	
	$rules = array(
		'words'           => 'required|alpha',
		'definition'      => 'required|alpha',
		'parts_of_speech' => 'required|alpha'
		);
	$validator = Validator::make(Input::all(), $rules);


	if ($validator->fails()) {
		return Redirect::to('listwords/' . $id . '/edit')
		->withErrors($validator)
		->withInput(Input::except('password'));
	} else {
			// store listword
		$listword =  Listword::find($id);
		$listword->words = Input::get('words');
		$listword ->save();
			// store wordinfo
		$wordinfo =  Wordinfo::find($id);
		$wordinfo->definition = Input::get('definition');
		$wordinfo->parts_of_speech = Input::get('parts_of_speech');

		$wordinfo ->save();


			// redirect
		Session::flash('message', 'Word successfully edited');
		return Redirect::to('listwords/show');
	}
}


		/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
		public function destroy($id)
		{
		// delete
			$wordinfo = Wordinfo::find($id);
			$wordinfo->delete();
			$listword = Listword::find($id);
			$listword->delete();

		// redirect
			Session::flash('message', 'Word was successfully deleted');
			return Redirect::to('listwords/show');
		}

		/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
		public function show()
		{
			$value=Listword::with("wordinfo")->orderBy('words','asc')->get();



		//load the view and pass the words
			return View::make('listwords.show')
			->with('value', $value);
		}

		public function usershow()
		{
			$value=Listword::with("wordinfo")->orderBy('words','asc')->get();



		//load the view and pass the words
			return View::make('listwords.usershow')
			->with('value', $value);
		}


	}