<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function getBloked($id){
        $user = User::findOrFail($id);
        if($user->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('/')->with('message', 'Vous n\'avez pas les droits pour accéder à cette partie !');
        }
        return View::make('admin/blok', compact("user"));
    }

    public function postBloked($id){
        $user = User::findOrFail($id);
        $datas = Input::only('role_id');
        if($user->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('/')->with('message', 'Vous n\'avez pas les droits pour accéder à cette partie !');
        }
        $user->update($datas);
        return Redirect::to('admin/users')->with('message', 'Le rôle a bien été modifié !');
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
