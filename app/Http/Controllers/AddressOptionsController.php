<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressOptionsStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Address/Add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(AddressOptionsStoreRequest $request)
    {
        try {
            Address::create([
                'user_id'=> auth()->user()->id,
                'addr1'=>$request->addr1,
                'addr2'=>$request->addr2,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'country'=>$request->country,
            ]);
            return redirect()->route('address.index');
        } 
        catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $address =  Address::find($id);
            $address->delete();
        } 
        catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
