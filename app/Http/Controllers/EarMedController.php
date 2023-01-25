<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Repositories\EarMedsRepository;
use App\Models\Inventory;
use Illuminate\Http\Request;

class EarMedController extends Controller
{
    public $earMeds;

    public function __construct(EarMedsRepository $earMeds)
    {
        $this->earMeds = $earMeds;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->earMeds->getAllEarMeds($request);
        return view('pages.ear-meds', $result);
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
        $this->earMeds->storeEarMeds($request);
        return redirect()->route('ear-meds.index')->with('success', 'Ear Meds added successfully');
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
        $this->earMeds->updateEarMeds($request, $id);
        return redirect()->route('ear-meds.index')->with('success', 'Ear Meds updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $id)
    {
        $this->earMeds->deleteEarMeds($id);
        return redirect()->route('ear-meds.index')->with('success', 'Ear Meds deleted successfully');
    }

    public function generatePdf()
    {
        $result = $this->earMeds->generatePdf();
        return $result;
    }
}
