<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function all_admin_document(){
        
        $all_admin_document = gallery::all();

        return view('admin_view.common.all_admin_document', compact('all_admin_document'));
    }

    public function all_galleries_document(){
        
        $all_galleries_document = gallery::all();

        return view('public_view.all_galleries_document', compact('all_galleries_document'));
    }

    public function add_document(){
        
        return view('admin_view.common.add_document');
    }

    public function add_document_info(Request $request){
        
        $request->validate(
            [
            "title" => "required",
            "description" => "required",
            "document"=> "required|max:8192",
        ]);
        
        $gallery = new gallery();

        $document_name = null;

        $first_name = 'gallery';
        $document_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
        $request->file('document')->move(public_path('storage/uploads/gallery/'), $document_name);

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->document = $document_name;
        $gallery->save();
        
        return redirect()->back()->with('success', 'Image Successfully Added..!');

    }

    public function update_document($doc_id){
        
        $update_document = gallery::find($doc_id);
        
        return view('admin_view.common.update_document', compact('update_document'));

    }

    public function update_document_info(Request $request){
        
        $request->validate(
            [
            "title" => "required",
            "description" => "required",
            "document"=> "required|max:8192",
        ]);
        
        
        $existing_gallery = gallery::find($request->doc_id);

        $document_name = null;

        if (!empty($request->document)) {
                
        
            $request->validate([
                "document"=> "required|max:10240",
            ]);

            if ($existing_gallery->document != '') {
                if (file_exists(public_path('storage/uploads/gallery/'.$existing_gallery->document))) {
                    unlink(public_path('storage/uploads/gallery/'.$existing_gallery->document));
                }
            }
            
            $first_name = 'gallery';
            $document_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();

            $existing_gallery->document = $document_name;
            
            $request->file('document')->move(public_path('storage/uploads/gallery/'), $document_name);

        }

        $existing_gallery->title = $request->title;
        $existing_gallery->description = $request->description;
        $existing_gallery->update();

        return redirect()->back()->with('success', 'Image Successfully Updated..!');

    }

    public function delete_document($doc_id){
        
        $delete_document = gallery::find($doc_id);
        if ($delete_document->document != '') {
            if (file_exists(public_path('storage/uploads/gallery/'.$delete_document->document))) {
                unlink(public_path('storage/uploads/gallery/'.$delete_document->document));
            }
        }
        
        $delete_document->delete();

        return redirect()->back()->with('error', 'Image Deleted..!');

    }










}
