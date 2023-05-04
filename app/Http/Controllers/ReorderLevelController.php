<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReorderLvlMedsRepository;

class ReorderLevelController extends Controller
{
    public $reorderLvlMeds;

    public function __construct(ReorderLvlMedsRepository $reorderLvlMeds)
    {
        $this->reorderLvlMeds = $reorderLvlMeds;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->reorderLvlMeds->getAllReorderLvlMeds($request);
        return view('pages.reorder-lvl-meds',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function generatePdf(Request $request)
    {
        $result = $this->reorderLvlMeds->generatePdf($request);
        return $result;
    }
}
