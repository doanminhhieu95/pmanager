<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            $Companies=Company::all();
            //dd($Companies);
            return View('Companies.index',['Companies'=>$Companies]);
        }
        return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $company = Company::create([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
        ]);
        if($company){
            return redirect()->route('company.index',['company'=>$company->id])
            ->with('thanhcong','Company created successfully');
        }
        return back()->withInput()->with('thanhcong','loi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::where('id',$company->id)->get();
        //$company = Company::find($company->id);
        //dd($company);
        return View('Companies.show',['company'=>$company[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
        $company = Company::find($company->id);
        //dd($company);
        return View('Companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $companyUpdate = Company::where('id', $company->id)
            ->Update([
                'Name' => $request->input('Name'),
                'Description'=>$request->input('Description'),
                'TenAnh' => $request->input('TenAnh'),
            ]);
        if($companyUpdate){
            return redirect()
            ->route('company.show',['company'=>$company->id])
            ->with('thanhcong','Company update successfuly');
        }
        //Quay lại trang ban đầu với tất cả thông tin của đối tượng đó
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        dd($company->id);
        $findCompany = Company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('company.index')
             ->with('thanhcong','Company delate successfuly');
        }
        return back()->withInput()->with('error','Company could not be delete');
    }
}
