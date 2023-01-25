<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Repositories\AntibioticsRepository;
use Illuminate\Http\Request;

class AntibioticsController extends Controller
{
    public $antibiotics;

    public function __construct(AntibioticsRepository $antibiotics)
    {
        $this->antibiotics = $antibiotics;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->antibiotics->getAllAntibiotic($request);
        return view('pages.antibiotics', $result);
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
        $this->antibiotics->storeAntibiotic($request);
        return redirect()->route('antibiotics.index')->with('success', 'Antibiotics added successfully');
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
        $this->antibiotics->updateAntibiotic($request, $id);
        return redirect()->route('antibiotics.index')->with('success', 'Antibiotics updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $id)
    {
        $this->antibiotics->deleteAntibiotic($id);
        return redirect()->route('antibiotics.index')->with('success', 'Antibiotics deleted successfully');
    }

    public function generatePdf()
    {
        $result = $this->antibiotics->generatePdf();
        return $result;
    }
}
