<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;

class DepositController extends Controller
{
    public $gateways = [
        'flutterwave',
        'payeer',
        'paypal',
        'paystack',
        'skrill',
        'voguepay'
    ];
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'wallet_id' => 'required',
            'gateway' => 'required'
        ]);

        // Check gateway
        if(! Arr::exists($this->gateways, $request->gateway)){
            return response()->json([
                'message' => 'Unidentified gateway'
            ], 500);
        }

        // Check wallet
        if(!$wallet = Wallet::find($request->wallet_id))
        {
            return response()->json([
                'message' => 'Unidentified wallet'
            ], 500);
        }

        $data = [
            'status' => 'PENDING'
        ];

        $data = Arr::prepend($data, $request->all());

        $deposit = Deposit::create($data);

        if($deposit){
            return response()->json([
                'message' => 'Deposit created successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'An error occured'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
