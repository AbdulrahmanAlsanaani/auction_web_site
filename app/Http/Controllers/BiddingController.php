<?php

namespace App\Http\Controllers;

use App\Models\auction;
use App\Models\Bidding;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
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
        if (!Auth::check()) {
            return redirect()->route('login')->with(['error' => 'عذرا لا تملك الصلاحية لدخول هذه الصفخة يرجا تسجيل الدخول او انشاء حساب']);
        }

        $user = User::with('wallet')->find(Auth::user()->id);
        $auction = auction::find($request->auction_id);
        if ($request->amount < $auction->min_bid) {
            return redirect()->back()->with(['error' => 'لايمكنك ادخال مبلغ اقل من ' . $auction->min_bid . '$ ' . ' لانها اقل قيمة للمزايدة']);
        }
        if (($auction->curren_price + $request->amount) * 10 / 100 > $user->wallet[0]->amount) {
            return redirect()->back()->with(['error' => 'يرجا شحن حسابك لانك لا تمكلك نقود كافية للقيام بالمزايدة']);
        }

        $auction->curren_price += $request->amount;
        $auction->number_of_participate+=1;
        $auction->update();
        $adminWallet = Wallet::find(3);
        $newBidding= new Bidding();
        $payerWallet = Wallet::where('user_id', Auth::user()->id)->where('coin_type', 0)->first();
        $adminWallet->amount += (($auction->curren_price + $request->amount) * 10 / 100);
        $adminWallet->update();
        $payerWallet->amount -= (($auction->curren_price + $request->amount) * 10 / 100);
        $payerWallet->update();
        $newBidding->user_id=Auth::user()->id;
        $newBidding->auction_id=$request->auction_id;
        $newBidding->bidding_amount=$request->amount;
        $newBidding->save();
        // $test= $user->wallet[0]->amount ;    //$request->amount;
        return redirect()->back()->with(['success' => 'تمت عملية المزايدة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bidding  $bidding
     * @return \Illuminate\Http\Response
     */
    public function show(Bidding $bidding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bidding  $bidding
     * @return \Illuminate\Http\Response
     */
    public function edit(Bidding $bidding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bidding  $bidding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bidding $bidding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bidding  $bidding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bidding $bidding)
    {
        //
    }
}
