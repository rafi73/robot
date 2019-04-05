<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
      /**
     * The author repository instance.
     *
     * @var RobotRepository
     */
    protected $robots;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of all robots.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $robots = $this->robots->getAll();

        return view('robots.index', compact('robots'));
    }

    /**
     * Display a form to create a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('robots.create');
    }

    /**
     * Create a new author.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->robots->create($request->all());

        return redirect('/robots');
    }

    /**
     * Display an author.
     *
     * @param type $id
     *
     * @return type
     */
    public function show($id)
    {
        $robot = $this->robots->find($id);

        return view('robots.show', compact('author'));
    }

    /**
     * Display a form to edit an author.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;

        $robot = $this->robots->find($id);

        return view('robots.edit', compact('author'));
    }

    /**
     * Update an author.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->robots->update($request->all(), $id);

        return redirect('/robots');
    }

    /**
     * Delete an author.
     *
     * @param type $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $this->robots->delete($id);

        return redirect('/robots');
    }
}
