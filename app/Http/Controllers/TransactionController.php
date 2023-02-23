<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = getUserFromToken($request->bearerToken());

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
    public function transfer(Request $request)
    {
        //validate
        $validated = $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'amount' => 'required|numeric'
        ]);

        // Check origin balance
        if(!$origin_wallet = Wallet::whereAddress($validated['origin'])->first())
        {
            return response()->json([
                'message' => 'UNKNOWN_ORIGIN_WALLET'
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = getUserFromToken();
        if($user->id !== $origin_wallet->user->id)
        {
            return response()->json([
                'message' => 'UNAUTHORIZED_WALLET_OWNER'
            ], Response::HTTP_UNAUTHORIZED);
        }

        if(!$destination_wallet = Wallet::whereAddress($validated['destination'])->first())
        {
            return response()->json([
                'message' => 'UNKNOWN_DESTINATION_WALLET'
            ], Response::HTTP_BAD_REQUEST);
        }

        if(intval($origin_wallet->balance) <= intval($validated['amount']))
        {
            return response()->json([
                'message' => 'INVALID_AMOUNT_INPUT'
            ], Response::HTTP_BAD_REQUEST);
        }

        // Debit Origin Wallet | Credit Dstination Wallet | Add fees
        $origin_wallet->balance -= $validated['amount'];
        $origin_wallet->saveQuietly();
        $destination_wallet->balance += $validated['amount'];
        $destination_wallet->saveQuietly();
        // Create receipt #
        $receipt = random_string(16, true);
        $receipt = "TX-".Str::upper($receipt);

        // Create transaction
        $t_origin = Transaction::create([
            'origin' => $origin_wallet->id,
            'destination' => $destination_wallet->id,
            'amount' => $validated['amount'],
            'note' => $request->note,
            'receipt' => $receipt,
            'fee' => 0,
            'type' => 'TRANSFER',
            'status' => 'COMPLETED'
        ]);

        if($t_origin){
            return response()->json([
                'message' => 'TRANSFER_COMPLETE',
                'receipt' => $t_origin->receipt
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => 'TRANSFER_ERROR',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction, $receipt)
    {
        $t = Transaction::whereReceipt($receipt)->firstOrFail();
        return response()->json([
            'message' => $t->load(['origin','destination'])
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
