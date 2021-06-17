<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Quoteline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
ini_set('max_execution_time', 300);
class QuotationController extends Controller
{
    public function show(){
        $user = auth()->user();
        $quotation = DB::table('quotations')
            ->where('user_id',$user->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();
        $quoteLines = DB::table('quotelines')
            ->where('quotation_id', $quotation->id)
            ->get();

        return view('quotation.show',[
            'user'=>$user,
            'quotation'=>$quotation,
            'quoteLines'=>$quoteLines
        ]);
    }
    public function download(){
        $user = auth()->user();
        $quotation = DB::table('quotations')
            ->where('user_id',$user->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->first();
        $quoteLines = DB::table('quotelines')
            ->where('quotation_id', $quotation->id)
            ->get();
        $pdf = PDF::loadView('quotation.show',[
            'user'=>$user,
            'quotation'=>$quotation,
            'quoteLines'=>$quoteLines
        ]);
        return $pdf->download('quotation.pdf');
    }
    public function checkout( Request $request){
        $quotation = Quotation::find($request->input('quotation'));
        $user = User::find($quotation->user_id);
        $quotation->status = 0;
        $quotation->save();
        $quotation = new Quotation;
        $quotation->status = 1;
        $quotation->comment = "";
        $quotation->user_id = $user->id;

        $quotation->save();
        return redirect('shop')->with('status', 'invoice finalized with success');
    }
    public function print(){

    }
    public function delete(Quotation $quotation, Quoteline $quoteline){
        DB::table('quotelines')->where('id',$quoteline->id)->delete();
        return redirect()->back();
    }
}
