<?php

namespace App\Http\Controllers\Admin\DateManagement;

use App\Http\Controllers\Controller;
use App\Models\SafariBlock;
use Illuminate\Http\Request;

class BlockDateManagementController extends Controller
{
    public function blockdates(Request $request)
    {
        $features = SafariBlock::paginate(10);
        return view('admin.safariDate.blockdates', compact('features'));
    }

    public function blockdatesAddView(Request $request)
    {
        return view('admin.safariDate.blockdates-add');
    }

    public function blockdatesAdd(Request $request)
    {
        $request->validate([
            'zone' => 'required',
            'to' => 'required',
            'from' => 'required',
            'message' => 'required',
        ]);
        $date = SafariBlock::create([
            "from" => $request->from,
            "to" => $request->to,
            "zone" => $request->zone,
            "message" => $request->message,
        ]);
        return redirect()->route('blockdates.list.view')->with('success', 'Safari Block Dates Added successfully.');
    }

    public function blockdatesEditView(Request $request, $id)
    {
        $date = SafariBlock::where('id', $id)->get()->toArray();
        $from = $date[0]['from'];
        $to = $date[0]['to'];
        $zone = $date[0]['zone'];
        $message = $date[0]['message'];
        return view('admin.safariDate.blockdates-edit', compact('from', 'to', 'id', 'zone', 'message'));
    }

    public function blockdatesEdit(Request $request, $id)
    {
        $request->validate([
            'zone' => 'required',
            'to' => 'required',
            'from' => 'required',
            'message' => 'required',
        ]);
        $date = SafariBlock::find($id);
        $date->update([
            "from" => $request->from,
            "to" => $request->to,
            "zone" => $request->zone,
            "message" => $request->message,
        ]);
        return redirect()->route('blockdates.list.view')->with('success', 'Safari Block Dates updated successfully.');
    }

    public function blockdatesDelete($id)
    {
        $date = SafariBlock::find($id);
        if ($date) {
            $date->delete();
            return redirect()->back()->with('success', 'Safari Block Dates deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Safari Block Dates not found');
        }
    }
}
