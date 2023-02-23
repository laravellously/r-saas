<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DepositController extends Controller
{
    public $gateways = [
        'flutterwave' => 'FLUTTERWAVE',
        'payeer' => 'PAYEER',
        'paypal' => 'PAYPAL',
        'paystack' => 'PAYSTACK',
        'skrill' => 'SKRILL',
        'voguepay' => 'VOGUEPAY'
    ];

    public function index(Request $request)
    {
        $wallet = Wallet::whereAddress($request->wallet)->firstOrFail();
        return response()->json([
            'message' => $wallet->deposits
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {

        $validated = $request->validate([
            'amount' => 'required|numeric',
            'wallet_address' => 'required',
            'gateway' => 'required'
        ]);

        // Check gateway
        if(! Arr::exists($this->gateways, $validated['gateway'])){
            return response()->json([
                'message' => 'UNKNOWN_GATEWAY'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Check wallet
        if(!$wallet = Wallet::where('address', $validated['wallet_address'])->first())
        {
            return response()->json([
                'message' => 'UNKNOWN_WALLET'
            ], Response::HTTP_BAD_REQUEST);
        }

        $receipt = random_string(14, true);
        $receipt = "R-".Str::upper($receipt);

        $data = [
            'status' => 'COMPLETED',
            'fee' => 0,
            'amount' => $validated['amount'],
            'wallet_id' => $wallet->id,
            'gateway' => $validated['gateway'],
            'receipt' => $receipt
        ];

        $deposit = Deposit::create($data);

        if($deposit){
            // Credit User Wallet
            $wallet->balance += $validated['amount'];
            $wallet->saveQuietly();

            // $controller = __NAMESPACE__ . '\\Gateway\\' . Str::ucfirst($request->gateway) . '\\ProcessController';
            // $deposit_data = $controller::process($deposit);
            // $deposit_data = json_decode($deposit_data);

            // if(isset($deposit_data->redirect))
            // {
            //     return response()->json([
            //         'message' => $deposit_data->redirect_url
            //     ]);
            // }
            return response()->json([
                'message' => 'DEPOSIT_COMPLETED',
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'DEPOSIT_ERROR'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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

}
