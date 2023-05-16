<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Repositories\CardiacDrugsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardiacDrugsController extends Controller
{
    public $cardiacDrugs;

    public function __construct(CardiacDrugsRepository $cardiacDrugs)
    {
        $this->cardiacDrugs = $cardiacDrugs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->cardiacDrugs->getAllCardiacDrugs($request);
        return view('pages.cardiac-drugs', $result);
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
        $this->cardiacDrugs->storeCardiacDrugs($request);
        return redirect()->route('cardiac-drugs.index')->with('success', 'Cardiac Drug added successfully');
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
        $this->cardiacDrugs->updateCardiacDrugs($request, $id);
        return redirect()->route('cardiac-drugs.index')->with('success', 'Cardiac Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $id)
    {
        DB::beginTransaction();
        try {
            $med = $this->cardiacDrugs->deleteCardiacDrugs($id);
            DB::commit();
            return redirect()->route('cardiac-drugs.index')->with('success', 'Cardiac Drug deleted successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('cardiac-drugs.index')->with('error', 'CANNOT DELETE A PARENT ROW!');

        }
    }

    public function generatePdf(Request $request)
    {
        $result = $this->cardiacDrugs->generatePdf($request);
        return $result;
    }
}
