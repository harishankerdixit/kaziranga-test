<?php

namespace App\Http\Controllers\Admin\DateManagement;

use App\Http\Controllers\Controller;
use App\Imports\DateImport;
use App\Models\DateManagement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DevDateManagementController extends Controller
{
    public function index(Request $request)
    {
        $filter_date = $request->filter_date;
        $filter_mode = $request->filter_mode;
        $filter_time = $request->filter_time;
        $filter_availability = $request->filter_availability;

        $dates = DateManagement::query();

        if (isset($filter_date)) {
            $dates = $dates->whereDate('date', $filter_date);
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
        // $dates = $dates->where('mode', 'devalia');
        $dates = $dates->where('zone', 'Western Range');
        $dates = $dates->orderBy('date', 'asc')->paginate(20);
        return view('admin.safariDate.devalia', compact('dates', 'filter_date'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'mode' => 'required',
            'date' => 'required',
            'time' => 'required',
            'availability' => 'required',
        ];

        $messages = [
            'mode.required' => 'Please Select Mode',
            'date.required' => 'Please Select Date',
            'time.required' => 'Please Select Time',
            'availability.required' => 'Please Select Availability',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $check_data = DateManagement::whereDate('date', $request->date)
            ->where('mode', $request->mode)
            ->where('time', $request->time)
            ->first();
        if ($check_data) {
            return redirect()->back()->with('error', 'Record already present in Database.');
        }

        $date = new DateManagement();
        $date->date = $request->date;
        $date->mode = $request->mode;
        $date->time = $request->time;
        $date->status = $request->availability;
        $date->save();

        return redirect()->back()->with('success', 'Record Inserted successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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

    public function showCreateEvent()
    {
        return view('admin.safariDate.safariDevDateCreate');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = DateManagement::find($id);
        return view('admin.safariDate.safariDevDateEdit', ['date' => $date]);
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
        $rules = [
            'date' => 'required',
            'time' => 'required',
            'availability' => 'required',
        ];

        $messages = [
            'date.required' => 'Please Select Date',
            'time.required' => 'Please Select Time',
            'availability.required' => 'Please Select Availability',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $date = DateManagement::find($id);

        $check_data = DateManagement::whereDate('date', $request->date)
            ->where('mode', $date->mode)
            ->where('time', $request->time)
            ->where('id', '!=', $id)
            ->first();

        if ($check_data) {
            return redirect()->back()->with('error', 'Record already present in Database.');
        }

        $date->date = $request->date;
        $date->time = $request->time;
        $date->status = $request->availability;
        $date->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = DateManagement::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Date deleted successfully');
        } else {
            session()->flash('error', 'Date not found');
        }

        return redirect()->back();
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
        $filter_mode = $request->filter_mode;
        $filter_time = $request->filter_time;
        $filter_availability = $request->filter_availability;

        $dates = DateManagement::query();

        if (isset($filter_date)) {
            $dates = $dates->whereDate('date', $filter_date);
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
        $dates = $dates->where('mode', 'devalia');
        $dated = $dates->get();

        $csvFileName = 'date.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$csvFileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $handle = fopen('php://output', 'w');

        // Add CSV header
        fputcsv($handle, ['date', 'time', 'mode', 'status']);

        // Add CSV data
        foreach ($dated as $date) {
            fputcsv($handle, [$date->date, $date->time, $date->mode, $date->status]);
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
}
