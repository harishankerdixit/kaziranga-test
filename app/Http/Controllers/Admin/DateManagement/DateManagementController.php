<?php

namespace App\Http\Controllers\Admin\DateManagement;

use App\Http\Controllers\Controller;
use App\Models\DateManagement;
use Illuminate\Http\Request;
use App\Imports\DateImport;
use Maatwebsite\Excel\Facades\Excel;

class DateManagementController extends Controller
{
    public function index(Request $request)
    {
        $filter_date = $request->filter_date;
        $filter_mode = $request->filter_mode;
        $filter_time = $request->filter_time;
        $filter_availability = $request->filter_availability;
        $filter_zone = $request->filter_zone;

        $dates = DateManagement::query();
        if (isset($filter_date)) {
            $dates = $dates->where('date', $filter_date);
        }

        if (isset($filter_mode)) {
            $dates = $dates->where('mode', $filter_mode);
        }

        if (isset($filter_time)) {
            $dates = $dates->where('time', $filter_time);
        }

        if (isset($filter_availability)) {
            $dates = $dates->where('status', $filter_availability);
        }

        if (isset($filter_zone)) {
            $dates = $dates->where('zone', $filter_zone);
        }

        $dates = $dates->orderBy('date', 'desc')->paginate(20);

        $dates->appends([
            'filter_date' => $filter_date,
            'filter_mode' => $filter_mode,
            'filter_time' => $filter_time,
            'filter_availability' => $filter_availability,
            'filter_zone' => $filter_zone,
        ]);

        return view('admin.safariDate.jungletrail', compact('dates', 'filter_date', 'filter_mode', 'filter_time', 'filter_availability', 'filter_zone'));
    }

    public function showCreateEvent()
    {
        return view('admin.safariDate.safariDateCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'mode' => 'required',
            'zone' => 'required',
            'availability' => 'required',
        ]);

        $check_data = DateManagement::where('date', $request->date)
            ->where('mode', $request->mode)
            ->where('time', $request->time)
            ->first();
        if ($check_data) {
            return redirect()->back()->with('error', 'Date already present in Database.');
        }

        $date = DateManagement::create([
            'date' => $request->date,
            'mode' => $request->mode,
            'time' => $request->time,
            'zone' => $request->zone,
            'status' => $request->availability,
        ]);
        return redirect()->back()->with('success', 'Date Inserted successfully..');
    }

    public function edit($id)
    {
        $date = DateManagement::find($id);
        return view('admin.safariDate.safariDateEdit', ['date' => $date]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'mode' => 'required',
            'zone' => 'required',
            'availability' => 'required',
        ]);

        $date = DateManagement::find($id);

        $check_data = DateManagement::where('date', $request->date)
            ->where('mode', $date->mode)
            ->where('time', $request->time)
            ->where('id', '!=', $id)
            ->first();
        if ($check_data) {
            return redirect()->back()->with('error', 'Record already present in Database.');
        }

        $date->update([
            'date' => $request->date,
            'mode' => $request->mode,
            'time' => $request->time,
            'zone' => $request->zone,
            'status' => $request->availability,
        ]);
        return redirect()->route('getJungleTrail')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $date = DateManagement::find($id);
        if ($date) {
            $date->delete();
            return redirect()->back()->with('success', 'Record updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Date not found');
        }
    }

    public function status(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = DateManagement::findOrFail($request->id);
                $date->update(['status' => $request->newAvailability]);

                return [
                    'status' => 'success',
                    'msg' => 'Record Updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }

    public function import(Request $request)
    {
        $data = $request->all();
        $all_data = DateManagement::where('mode', $request->mode)->get();
        foreach ($all_data as $date) {
            DateManagement::find($date['id'])->delete();
        }
        Excel::import(new DateImport($data), $request->file);

        return [
            'status' => 'success',
            'msg' => 'All Dates imported successfully!',
        ];
    }

    public function exportCsv(Request $request)
    {
        ini_set('memory_limit', '512M');

        $filter_date = $request->filter_date;
        $filter_time = $request->filter_time;
        $filter_mode = $request->filter_mode;
        $filter_zone = $request->filter_zone;
        $filter_availability = $request->filter_availability;

        $dates = DateManagement::query();

        if (isset($filter_date)) {
            $dates = $dates->where('date', $filter_date);
        }

        if (isset($filter_time)) {
            $dates = $dates->where('time', $filter_time);
        }

        if (isset($filter_mode)) {
            $dates = $dates->where('mode', $filter_mode);
        }

        if (isset($filter_zone)) {
            $dates = $dates->where('zone', $filter_zone);
        }

        if (isset($filter_availability)) {
            $dates = $dates->where('status', $filter_availability);
        }
        // $dates = $dates->where('mode', 'jungle_trail');
        $dated = $dates->get();

        $csvFileName = 'kaziranga-date.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$csvFileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $handle = fopen('php://output', 'w');

        // Add CSV header
        fputcsv($handle, ['date', 'time', 'mode', 'zone', 'status']);

        // Add CSV data
        foreach ($dated as $date) {
            fputcsv($handle, [$date->date, $date->time, $date->mode, $date->zone, $date->status]);
        }

        fclose($handle);

        $headers['Connection'] = 'close';

        return response()->stream(
            function () use ($handle) {
                if (is_resource($handle)) {
                    fclose($handle);
                }
            },
            200,
            $headers,
        );
    }

    public function deleteAllDates()
    {
        try {
            $truncateTable = DateManagement::truncate();

            if ($truncateTable) {
                session()->flash('success', 'Dates deleted successfully');
            } else {
                session()->flash('error', 'No dates found for the specified mode');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while deleting dates: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    // public function export(Request $request)
    // {
    //     header('Content-Type: text/csv; charset=utf-8');
    //     header('Content-Disposition: attachment; filename=date-' . $request->mode . '-' . date('Y-m-d-h-i-s') . '.csv');
    //     $output = fopen('php://output', 'w');

    //     fputcsv($output, ['Date', 'Time', 'Mode', 'Status']);

    //     $all_data = DateManagement::where('mode', $request->mode)->get();
    //     if (count($all_data) > 0) {
    //         foreach ($all_data as $data) {
    //             $p_row = [$data['date'], $data['time'], $data['mode'], $data['status']];

    //             fputcsv($output, $p_row);
    //         }
    //     }
    // }
}
