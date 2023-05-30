<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MedicineForecastRepository;

class MedicineForecastController extends Controller
{
    public $medicine;

    public function __construct(MedicineForecastRepository $medicine)
    {
        $this->medicine = $medicine;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTopTen(Request $request)
    {
        $result = $this->medicine->getTopTenMedicines($request);
        return json_encode($result);
    }
}
