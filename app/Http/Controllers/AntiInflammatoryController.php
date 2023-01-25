<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Repositories\AntiInflammatoryRepository;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AntiInflammatoryController extends Controller
{
    public $antiInflammatory;

    public function __construct(AntiInflammatoryrepository $antiInflammatory)
    {
        $this->antiInflammatory = $antiInflammatory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->antiInflammatory->getAllAntiInflammatory($request);
        return view('pages.anti-inflammatory', $result);
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
        $this->antiInflammatory->storeAntiInflammatory($request);
        return redirect()->route('anti-inflammatory.index')->with('success', 'Anti-inflammatory addedd successfully');
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
    public function update(UpdateInventoryRequest $request, $id)
    {
        $this->antiInflammatory->updateAntiInflammatory($request, $id);
        return redirect()->route('anti-inflammatory.index')->with('success', 'Anti-inflammatory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $id)
    {
        $this->antiInflammatory->deleteAntiInflammatory($id);
        return redirect()->route('anti-inflammatory.index')->with('success', 'Anti-inflammatory deleted successfully');
    }

    public function generatePdf()
    {
        $result = $this->antiInflammatory->generatePdf();
        return $result;
    }
}
