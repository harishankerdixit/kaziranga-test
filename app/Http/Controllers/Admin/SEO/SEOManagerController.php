<?php

namespace App\Http\Controllers\Admin\SEO;

use App\Http\Controllers\Controller;
use App\Models\PageBuilders;
use Illuminate\Http\Request;

class SEOManagerController extends Controller
{
    public function seoManagerView(Request $request)
    {
        $customers = PageBuilders::orderBy('created_at', 'asc')->paginate(20);

        return view('admin.seo.seo', compact('customers'));
    }

    public function createSeoManager(Request $request)
    {
        return view('admin.seo.add-seo');
    }

    public function storeSeoManager(Request $request)
    {
        $seo = new PageBuilders();
        $seo->type = $request->url;
        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;

        $seo->save();

        session()->flash('success', 'SEO Added successfully..');

        return redirect()->back();
    }

    public function editSeoManager(Request $request, $id)
    {
        $seo = PageBuilders::where('id', $id)->get()->toArray();
        $seoURL = $seo[0]['type'];
        $seoTitle = $seo[0]['meta_title'];
        $seoDescription = $seo[0]['meta_description'];

        return view('admin.seo.edit-seo', compact('id', 'seoURL', 'seoTitle', 'seoDescription'));
    }

    public function updateSeoManager(Request $request, $id)
    {
        $seo = PageBuilders::find($id);
        $seo->type = $request->url;
        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->save();

        session()->flash('success', 'SEO Updated successfully..');

        return redirect()->route('seo-manager-view');
    }

    public function deleteSeoManager($id)
    {
        $date = PageBuilders::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'SEO deleted successfully');
        } else {
            session()->flash('error', 'SEO Category not found');
        }

        return redirect()->back();
    }
}
