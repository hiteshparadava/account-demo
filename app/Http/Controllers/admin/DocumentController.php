<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents =  Document::get();
        return view('admin.documents',compact("documents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.document-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:50',
            'document'=>'required|mimes:doc,docx',
        ]);

        $file = $request->file('document');

        $filePath = $file->store('uploads/document', 'public');
        // Store file information in the database
        $document = new Document;
        $document->title = $request->title;
        $document->file = $filePath;
        $document->save();

        return redirect()->route('admin.document')->with('success-message','Uploaded Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document= Document::FindOrFail($id);
        return view('admin.document-edit',compact("document"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document= Document::FindOrFail($id);

        if($request->file('document'))
        {
            $request->validate([
                'title'=>'required|max:50',
                'document'=>'required|mimes:doc,docx',
            ]);

            

            $file = $request->file('document');
            $filePath = $file->store('uploads/document', 'public');
            $document->file = $filePath;
        }
        else
        {
            $request->validate([
                'title'=>'required|max:50',
            ]);
        }

        $document->title = $request->title;
        $document->save();

        return redirect()->route('admin.document')->with('success-message','Uploaded Successfully !');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::find($id);
        if($document){
            $destroy = Document::destroy($id);
        }
        
        return redirect()->route('admin.document')->with('success-message','Deleted Successfully !');
    }
}
