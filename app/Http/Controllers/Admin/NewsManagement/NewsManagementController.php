<?php

namespace App\Http\Controllers\Admin\NewsManagement;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();
        $date = $request->input('date');
        $status = $request->input('status');
        
        if ($request->filled('date')) {
            $query->where('date', 'like', '%' . $request->input('date') . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->input('status') . '%');
        }
        $newsess = $query->orderBy('id', 'desc')->paginate(5);

        return view('admin.news.news', compact('newsess', 'date','status'));
    }

    public function createNews(Request $request)
    {
        return view('admin.news.add-news');
    }

    public function storeNews(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'description' => 'required',
            'url' => 'required',
            'status' => 'required',
        ]);

        $news = News::create($validatedData);
        if ($news) {
            return redirect()->back()->with('success', 'News Created Successfully..');
        } else {
            return redirect()->back()->with('error', 'News Creation Failed.');
        }
    }

    public function editNews($id)
    {
        $news = News::find($id);
        return view('admin.news.edit-news', compact('news'));
    }

    public function updateNews(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'description' => 'required',
            'url' => 'required',
            'status' => 'required',
        ]);

        $news = News::find($id)->update($validatedData);
        if ($news) {
            return redirect()->route('news-list')->with('success', 'News Updated Successfully..');
        } else {
            return redirect()->route('news-list')->with('error', 'News Updation Failed.');
        }
    }

    public function updateNewsStatus(Request $request)
    {
        if ($request->id && isset($request->status)) {
            try {
                $date = News::findOrFail($request->id);
                $date->update(['status' => $request->status]);
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

    public function deleteNews($id)
    {
        $news = News::find($id);

        if ($news) {
            $news->delete();

            session()->flash('success', 'News deleted successfully');
        } else {
            session()->flash('error', 'News not found');
        }

        return redirect()->back();
    }
}
