<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;
use App\Models\Director;

class DirectorController extends Controller
{
    public function __construct()
    {

    }
    function index($company_id)
    {
        $user=Auth::user();
        $companyDetails= Company::find($company_id);
        $directors= Director::where('company_id',$company_id)->get();
        return view('front.director.list',compact("user","companyDetails","directors","company_id"));
    }

    function create($company_id)
    {
        $user=Auth::user();
        $companyDetails= Company::find($company_id);
        return view('front.director.create',compact("user","companyDetails"));
    }

    function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required',
            'type'=>'required'
        ]);

        $user=Auth::user();

        $director= new Director;
        $director->user_id=$user->id;
        $director->company_id=$request->company_id;
        $director->type=$request->type;
        $director->full_name=$request->full_name;
        $director->address_1=$request->address_1;
        $director->address_2=$request->address_2;
        $director->address_3=$request->address_3;
        $director->postal_code=$request->postal_code;
        $director->nric_no=$request->nric_no;
        $director->passport_no=$request->passport_no;
        $director->passport_expiration_date=$request->passport_expiration_date;
        $director->contact_no=$request->contact_no;
        $director->nationality=$request->nationality;
        $director->dob=$request->dob;
        $director->email=$request->email;
        $director->share_holdings=$request->share_holdings;


        if($request->file('nric_file'))
        {
            $file = $request->file('nric_file');
            $filePath = $file->store('uploads/company/nric_file', 'public');
            $director->nric_file = $filePath;
        }

        if($request->file('notarised_id_card_file'))
        {
            $file = $request->file('notarised_id_card_file');
            $filePath = $file->store('uploads/company/notarised_id_card_file', 'public');
            $director->notarised_id_card_file = $filePath;
        }

        if($request->file('notarised_passport_file'))
        {
            $file = $request->file('notarised_passport_file');
            $filePath = $file->store('uploads/company/notarised_passport_file', 'public');
            $director->notarised_passport_file = $filePath;
        }

        if($request->file('address_proof_file'))
        {
            $file = $request->file('address_proof_file');
            $filePath = $file->store('uploads/company/address_proof_file', 'public');
            $director->address_proof_file = $filePath;
        }

        $director->save();

        return redirect()->route('user.director',$request->company_id)->with('success-message','Addes Successfully !');
    }
}
