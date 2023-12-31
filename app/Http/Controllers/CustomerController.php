<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('companies')->latest()->get();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('customer.create', compact('countries'));
    }

    public function getCompany($id){
        $company = DB::table('companies')->where('id',$id)->first();
        return $company;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'tax_id' => 'required|numeric',
            // 'country' => 'required',
            // 'governate' => 'required',
            // 'regionCity' => 'required',
            'street' => 'required',
            // 'buildingNumber' => 'required',
        ]);

        Customer::create(array_merge($request->all(), ['user_taxid' => auth()->user()->details->company_id]));

        session()->flash('message', 'Created Successfully');

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        // $countries = Country::all();

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'tax_id' => 'required|numeric',
            // 'country' => 'required',
            // 'governate' => 'required',
            // 'regionCity' => 'required',
            'street' => 'required',
            // 'buildingNumber' => 'required',
        ]);

        $customer->update($request->all());

        session()->flash('message', 'Updated Successfully');

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('message', 'deleted Successfully');
        return redirect('customer');

    }

    public function savecustomer(Request $request)
    {

        try {

            $request->validate([
                'type' => 'required',
                'name' => 'required',
                'phone' => 'required|numeric',
                'reg_numer' => 'required|numeric',
                'branch_address' => 'required|min:10',
            ]);

            Customer::create($request->all());

            session()->flash('message', 'Created Successfully');

        } catch (\Exception $e) {

            session()->flash('modal', 'modal');

            return redirect()->back();
        }

        return redirect()->back();

    }

}
