<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Document;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    function index()
    {
        $user=Auth::user();
        return view('front.user-detail',compact("user"));
    }

    
    function updateProfile(Request $request)
    {
        $user=Auth::user();
        $request->validate([
            'phone_number'=>'max:13',
            'company_name'=>'max:200',
            'company_no'=>'max:250',
            'director'=>'max:250',
            'address'=>'max:250',
        ]);

        $userDetails = User::find($user->id);
        $userDetails->phone_number = $request->phone_number;
        $userDetails->company_name = $request->company_name;
        $userDetails->company_no = $request->company_no;
        $userDetails->director = $request->director;
        $userDetails->address = $request->address;
        $userDetails->save();

        return back()->with('success-message','Updated Successfully!.');
    }

    function documents()
    {
        $documents =  Document::get();
        $user=Auth::user();
        return view('front.user-documents',compact("user",'documents'));
    }


    function downloadDocument($documentId)
    {
        $user=Auth::user();
        $userId=$user->id;

        $user= User::FindOrFail($userId);
        $document= Document::FindOrFail($documentId);

        $new_file_name=trim($document->title)."-".$documentId.'-'.$userId.'.docx';
        $new_file_path=public_path('storage\\'.'uploads/document/'.$new_file_name);
        
        $file=public_path('storage\\'.$document->file);
        $phpword = new TemplateProcessor($file);
        $phpword->setValue('{company-name}',$user->company_name);
        $phpword->setValue('{company-no}',$user->company_no);
        $phpword->setValue('{director}',$user->director);
        $phpword->setValue('{directorb}',$user->director);
        $phpword->setValue('{date}','27 February 2024');

        $phpword->saveAs($new_file_path);
        
        return response()->download($new_file_path)->deleteFileAfterSend(true);;
    }

    function downloadDocumentAll()
    {
        $user=Auth::user();
        $userId=$user->id;
        
        $user= User::FindOrFail($userId);
        $documents= Document::get();

        File::ensureDirectoryExists('storage\\'.'uploads/document/'.$userId.'/zip');
        foreach($documents as $document)
        {
            $new_file_name=trim($document->title)."-".$document->id.'.docx';
            $new_file_path=public_path('storage\\'.'uploads/document/'.$userId.'/zip/'.$new_file_name);
            $file=public_path('storage\\'.$document->file);
            
            $phpword = new TemplateProcessor($file);
            $phpword->setValue('{company-name}',$user->company_name);
            $phpword->setValue('{company-no}',$user->company_no);
            $phpword->setValue('{director}',$user->director);
            $phpword->setValue('{directorb}',$user->director);
            $phpword->setValue('{date}','27 February 2024');
            $phpword->saveAs($new_file_path);
        }

        $zip = new \ZipArchive();
        $fileName = trim($user->name).'-document.zip';
        if ($zip->open(public_path($fileName), \ZipArchive::CREATE)== TRUE)
        {
            $files = File::files(public_path('storage\\'.'uploads/document/'.$userId.'/zip'));
            foreach ($files as $key => $value){
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
            unlink($new_file_path);
            return response()->download(public_path($fileName))->deleteFileAfterSend(true);
        }
    }
}
