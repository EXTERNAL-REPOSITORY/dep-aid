<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Repositories\TopicalsRepository;
use Illuminate\Http\Request;

class TopicalController extends Controller
{
    public $topicals;

    public function __construct(TopicalsRepository $topicals)
    {
        $this->topicals = $topicals;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->topicals->getAllTopicals($request);
        return view('pages.topicals', $result);
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
    public function store(StoreInventoryRequest $request)
    {
        $this->topicals->storeTopicals($request);
        return redirect()->route('topicals.index')->with('success', 'Topicals added successfully');
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
    public function update(UpdateInventoryRequest $request, Inventory $id)
    {
        $this->topicals->updateTopicals($request, $id);
        return redirect()->route('topicals.index')->with('success', 'Topicals updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $id)
    {
        $this->topicals->deleteTopicals($id);
        return redirect()->route('topicals.index')->with('success', 'Topicals deleted successfully');
    }

    public function generatePdf()
    {
        $result = $this->topicals->generatePdf();
        return $result;
    }
}
