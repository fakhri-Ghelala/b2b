@extends('layout')

@section('content')
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title" width="33%">
                                <img src="{{asset('img/b2b-icon.jpg')}}" style="width: 150px; max-width: 150px" height="120px" />
                            </td>
                            <td  width="33%" valign="center"><h3 class="invoice_title"> INVOICE</h3></td>
                            <td width="33%">
                                Invoice #: {{$quotation->id}}<br />
                                Created: {{$quotation->created_at}}<br />
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="invoice_info" width="33%">
                                <h4>from:</h4>
                                B2B WholeSale Tunisa
                                <br>
                                b2b@yahoo.fr
                                <br>
                                +216 98259565
                            </td>
                            <td width="33%"></td>
                            <td class="invoice_info" width="33%">
                                <h4>to:</h4>
                                @php
                                    $buyer = \App\Models\User::find($quotation->user_id);
                                @endphp
                                <u>Name:</u> </strng>{{$buyer->name}}
                                <br>
                                <u>Email:</u>{{$buyer->email}}
                                <br>
                                <u>Tel:</u>{{$buyer->telephone}}
                                <br>
                                <u>Adress:</u>{{$buyer->adress}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td colspan="5">Payment Method</td>
                <td colspan="2">
                    <select name="" id="" class="form-select">
                        <option value="check">check</option>
                        <option value="card">card</option>
                        <option value="cash">cash</option>
                    </select>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="5"><b>withholding Tax</b></td>
                <td colspan="2">
                    <select name="retenu" id="retenu" onchange="calcul_total()" class="form-select">
                        <option value="0">
                            exempt
                        </option>
                        <option value="15">15%</option>
                    </select>
                </td>
            </tr>


            <tr class="heading">
                <td width="20%">Item</td>
                <td>Qty</td>

                <td>Unit Price</td>
                <td>Tax</td>
                <td>Price Without Tax</td>
                <td>Price with Tax</td>
                <td></td>
            </tr>
            @php
                $total_with_tax=600;
                $total_without_tax = 600;
                @endphp
            @foreach($quoteLines as $quoteline)
                @php
                    $product = \App\Models\Product::find($quoteline->product_id);

                $price_without_tax =$product->price*$quoteline->quantity;
                $price_with_tax = $price_without_tax + $price_without_tax*$product->tax;
                $total_without_tax += $price_without_tax;
                $total_with_tax += $price_with_tax;

                    @endphp
            <tr class="item">
                <td>{{$product->name}}</td>
                <td>{{$quoteline->quantity}}</td>
                <td align="center">{{$product->price/1000}}</td>
                <td align="center">{{$product->tax}}</td>
                <td align="center">{{$price_without_tax/1000}}</td>
                <td align="center">{{$price_with_tax/1000}}</td>
                <td align="right"><a href="quotation/{{$quotation->id}}/delete/{{$quoteline->id}}" onclick="confirmation()">
                        <i class="fas fa-trash-alt"></i>

                    </a></td>
            </tr>
            @endforeach

            <tr class="heading">
                <td colspan="6"> Tax Stamp</td>
                <td>0.600TND</td>
            </tr>
            <tr class="heading">
                <td colspan="6"><b>Total Without Tax</b></td>

                <td>{{$total_without_tax/1000}} TND</td>
            </tr>
            <tr class="heading">
                <td colspan="6"><b>Total With Tax</b></td>

                <td>{{$total_with_tax/1000}} TND</td>
            </tr>
            <tr class="heading">
                <td colspan="6"><b>Net Amount To Pay</b></td>

                <td > <span id="total">{{$total_with_tax/1000}}</span> TND</td>
            </tr>


        </table>
        <div class="btn-group" style="width: 20%; margin-left: 78%;
 margin-top: 1%">
            <form action="{{route('checkout')}}" method="post">
                @csrf
                <input type="hidden" name="quotation" value="{{$quotation->id}}">
                <input type="submit" value="checkout" class="btn " id="btn-checkout">
            </form>

            <a href="{{route("download_quotation")}}" class="btn btn-success">Print</a>

        </div>
    </div>
@stop
