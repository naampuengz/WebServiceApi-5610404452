<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalulateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $housePrice = $request->HousePrice;
        $interestRate = $request->InterestRate /100/12;
        $yearDuration = $request->YearDuration *12;

        $firstStep = $housePrice*$interestRate/(1-1/((1+$interestRate)**$yearDuration));
        $secondStep= $firstStep%100;
        $perMonth =  $firstStep-$secondStep+100;

        $perMonth = number_format($perMonth, 2, '.', ',');

        $interest = $housePrice*$request->InterestRate/100/365*30;
        $interest = number_format($interest, 2, '.', ',');

        return [
            'Program' => 'Calculate Monthly Home/House price' ,
            'Input' => '****************************************',
            'House Price'=> number_format($request->HousePrice, 2, '.', ',') . 'Baht',
            'Interest Rate(%)' => $request->InterestRate . '%',
            'Year Duration' => $request->YearDuration . 'years',
            '******' => '***************************************',
            'Result' => '***************************************',
            'Monthly home price' => $perMonth,
            'Interest Rate(Baht)' => $interest
        ];
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
}
