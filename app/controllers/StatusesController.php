<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;

/**
 * Class StatusesController
 */
class StatusesController extends \BaseController {


    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @var
     */
    protected $statusRepository;


    /**
     * @param StatusRepository $statusRepository
     */
    function __construct(StatusRepository $statusRepository, PublishStatusForm $publishStatusForm)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getAllForUser(Auth::user());

		return View::make('statuses.index',compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * save a new status
	 *
	 * @return Response
	 */
	public function store()
	{

        $input = Input::all();
        $input['userId'] = Auth::id();

        $this->publishStatusForm->validate($input);


        $this->execute(PublishStatusCommand::class, $input);

        Flash::message('Your status has been updated!');

        return Redirect::back();

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
