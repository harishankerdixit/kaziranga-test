<?php

namespace App\Http\Controllers\Admin\PriceManagement;

use App\Http\Controllers\Controller;
use App\Models\PriceManagement;
use Illuminate\Http\Request;

class PriceManagementController extends Controller
{
    public function index(Request $request, $type)
    {
        switch ($type) {
            case 'default':
                $prices = PriceManagement::where(['type' => 'default'])->get();
                return view('admin.price.price-list', compact('prices', 'type'));
                break;
            case 'weekend':
                $prices = PriceManagement::where(['type' => 'weekend'])->get();
                return view('admin.price.price-list', compact('prices', 'type'));
                break;
            case 'date-range':
                $prices = PriceManagement::where(['type' => 'date-range'])
                    ->where('start', '!=', '')
                    ->take(4)
                    ->get();
                return view('admin.price.price-list', compact('prices', 'type'));
                break;
            default:
                return response()->json([
                    'status' => 200,
                    // 'prices' => $prices,
                    'type' => $request->type,
                ]);
                break;
        }
    }

    public function create($type)
    {
        return view('admin.price.price-create', compact('type'));
    }

    public function edit($id)
    {
        $price = PriceManagement::find($id);
        return view('admin.price.price-edit', compact('price', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mode'           => 'required',
            'indian'         =>  'required',
            'foreigner'      =>  'required',
            'start'          =>  $request->type == 'date-range' ? 'required' : '',
            'end'            =>  $request->type == 'date-range' ? 'required' : ''
        ]);
        PriceManagement::create([
            'type' => $request->type,
            'mode' => $request->mode,
            'indian' => $request->indian,
            'foreigner' => $request->foreigner,
            'start' => $request->type == 'date-range' ? $request->start : null,
            'end' => $request->type == 'date-range' ? $request->end : null
        ]);
        return redirect()->route('price', ['type' => $request->type])->with('success', 'Price Created successfully');
    }

    public function update(Request $request, $id)
    {
        $price = PriceManagement::find($id);
        $request->validate([
            'mode'           => 'required',
            'indian'         =>  'required',
            'foreigner'      =>  'required',
            'start'          =>  $request->type == 'date-range' ? 'required' : '',
            'end'            =>  $request->type == 'date-range' ? 'required' : ''
        ]);
        $price->update([
            'type' => $request->type,
            'mode' => $request->mode,
            'indian' => $request->indian,
            'foreigner' => $request->foreigner,
            'start' => $request->type == 'date-range' ? $request->start : null,
            'end' => $request->type == 'date-range' ? $request->end : null
        ]);
        return redirect()->route('price', ['type' => $request->type])->with('success', 'Price updated successfully');
    }

    // public function destroy($id)
    // {
    //     $Price = PriceManagement::find($id);
    //     $Price->delete();
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Price deleted successfully',
    //         'type' => $Price->type,
    //     ]);
    // }
}
