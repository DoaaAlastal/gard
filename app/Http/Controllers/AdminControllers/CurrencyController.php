<?php

namespace App\Http\Controllers\AdminControllers;


use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $currencies = Currency::all();
        return view('admin.constant.currency.index',compact('currencies'));
    }

    public function create()
    {
        return view('admin.constant.currency.add');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Currency::$rules);
        return(Currency::saveCurrency($request->all(), null));
    }

    public function edit($id)
    {
        $currency = Currency::where('id',$id)->first();
        return view('admin.constant.currency.edit',compact('currency'));

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(Currency::$rules);
        return(Currency::saveCurrency($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $currency = Currency::where('id',$id)->first();
        if ($currency) {
            $currency->delete();
            toastr( 'Successful Delete',  'danger',  'Currency');
            return redirect('admin/currencies');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/currencies');

    }
}
