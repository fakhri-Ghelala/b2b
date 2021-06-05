<?php

namespace App\Http\Controllers;
use App\Models\Quotation;
use Illuminate\Http\Request;

class quotationController extends Controller
{
    public function index(){
        $quotations = Quotation::all();
        return view('quotation.index',[
            "quotations"=>$quotations
        ]);
    }
    public function create(){ // retourne un view  contenant le formulaire de creation
        return view('quotation.create');
    }
    public function store(Request $request){ //prend les informations envoyées par le formulaire et les stocke dans la base
        //$request->validate([]);  //validation et control de saisie
        Quotation::create($request->all()); //insetion a la base en utilsant le model crée
        return redirect()->route('quotations_index');
    }
    public function update(Quotation $quotation){
        return view('quotation.update',['quotation'=>$quotation]);
    }
    public function modify(Quotation $id, Request $r){
        $q = Quotation::find($id)->first();

       $q->status = $r->status;
       $q->comment = $r->comment;
       $q->date_quotation = $r->date_quotation;
       $q->valid_until = $r->valid_until;
       $q->tax = $r->tax;
       $q->update();
       return redirect()->route('quotations_index');
    }
    public function destroy(Quotation $quotation){
        $quotation->delete();
        return redirect()->route('quotations_index');
    }
}
