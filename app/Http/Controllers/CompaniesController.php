<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;
use Maatwebsite\Excel\Facades\Excel;

class CompaniesController extends Controller
{
    
    function export(){
        return Excel::download(new Company, 'company.xlsx');
    }   

    function import(){
        Excel::import(new Company, request()->file('file'));
        return back();
    }

    function show_companies(){
        $data = Company::all();
        return view('masterdata.companies.companies', ['items' => $data]);
    }


    function edit_company($com_id){
        $data = Company::find($com_id);
        return response()->json($data);
    }

    function store(CompanyStoreRequest $req){
        if($req->company_id != '')
        {
            
            $data = Company::find($req->company_id);
               
        }
        else{
            
            $data = new Company();  
           
        }
        $data->company_code = $req->company_code;
        $data->company_name = $req->company_name;
        $data->company_description = $req->company_description;
        $data->company_status = $req->company_status;
        $data->save();
        return response()->json($data);
    }

    function delete($com_id){
        $data = Company::find($com_id);
        $data->delete();
        return response()->json($com_id);
    }
}
