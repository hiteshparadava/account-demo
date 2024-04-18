<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {

    }
    function index()
    {
        $user=Auth::user();
        $companys= Company::where('user_id',$user->id)->get();
        return view('front.company.list',compact("user","companys"));
    }

    function create()
    {
        $user=Auth::user();
        return view('front.company.create',compact("user"));
    }

    function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'number'=>'required'
        ]);

        $user=Auth::user();

        $company= new Company;
        $company->user_id=$user->id;
        $company->name=$request->name;
        $company->number=$request->number;
        $company->address_1=$request->address_1;
        $company->address_2=$request->address_2;
        $company->address_3=$request->address_3;
        $company->postal_code=$request->postal_code;
        $company->principal_address_1=$request->principal_address_1;
        $company->principal_address_2=$request->principal_address_2;
        $company->principal_address_3=$request->principal_address_3;
        $company->principal_postal_code=$request->principal_postal_code;
        $company->currency=$request->currency;
        $company->number_of_shares_issued_by_the_company=$request->number_of_shares_issued_by_the_company;
        $company->principal_SSIC_activity=isset($request->principal_SSIC_activity)?implode(',',$request->principal_SSIC_activity):"";
        $company->description_of_principal_SSIC_activity=$request->description_of_principal_SSIC_activity;
        $company->secondary_SSIC_activity=isset($request->secondary_SSIC_activity)?implode(',',$request->secondary_SSIC_activity):'';
        $company->description_of_secondary_SSIC_activity=$request->description_of_secondary_SSIC_activity;
        $company->issued_capital_of_company=$request->issued_capital_of_company;
        $company->paid_up_capital_of_company=$request->paid_up_capital_of_company;
        $company->financial_year_end_date=$request->financial_year_end_date;
        $company->save();

        return redirect()->route('user.company')->with('success-message','Deleted Successfully !');
    }
}
