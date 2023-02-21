<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
            'status' => 'PENDING',
            'fee' => 0
        ];

        $data = Arr::prepend($data, $request->all());

        $deposit = Deposit::create($data);

        if($deposit){
            $controller = __NAMESPACE__ . '\\Gateway\\' . Str::ucfirst($request->gateway) . '\\ProcessController';
            $deposit_data = $controller::process($deposit);
            $deposit_data = json_decode($deposit_data);

            if(isset($deposit_data->redirect))
            {
                return response()->json([
                    'message' => $deposit_data->redirect_url
                ]);
            }
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
