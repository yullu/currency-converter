<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mgcodeur\CurrencyConverter\Facades\CurrencyConverter;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('index',[
            'codes' => CurrencyConverter::currencies()->get()
        ]);
    }
    public function convert(Request $request)
    {
        $this->validate($request, [
            'amount' => 'numeric|required|min:1',
            'from' => 'required',
            'to' => 'required',
        ]);

        $convertedAmount = CurrencyConverter::convert($request->amount)
            ->from($request->from)
            ->to($request->to)
            ->format();

        return back()->with(['success' => $request->amount .' '.$request->from . ' '. 'Is equal to'.' '. $convertedAmount .' '.$request->to]);
    }
}
