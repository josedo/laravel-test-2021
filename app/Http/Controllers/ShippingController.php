<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Interfaces\IShippingService;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shipmentSuccess = ($request->session()->has('shipmentSuccess')) ? $request->session()->get('shipmentSuccess') : false;
        return view('shipping/shipping-form',['shipmentSuccess' => $shipmentSuccess]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IShippingService $shippingService)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'height' => ['required', 'int'],
            'width' => ['required', 'int'],
            'weight' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            return redirect('shippings/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->input('destination') == 1){
            $shipment = $shippingService->store(
                $request->input('name'),
                $request->input('height'),
                $request->input('width'),
                $request->input('weight'),
                'Sucursal EEUU, Avenue lorem ipsum dolor 13000'
            );
        } elseif ($request->input('destination') == 2) {
            $shipment = [
                'company' => 'Own fake shipping service',
                'uuid' => Str::uuid(),
                'name' => $request->input('name'),
                'height' => $request->input('height'),
                'width' => $request->input('width'),
                'weight' => $request->input('weight'),
                'user_id' => auth()->user()->id,
                'destination' => 'Sucursal X región Chile, Avenida lorem ipsum dolor 16000'
            ];
            DB::transaction(function () use ($shipment) {
                return tap(Shipping::create($shipment));
            });
        }
        return redirect()->route('shippings.create')->with('shipmentSuccess', $shipment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
