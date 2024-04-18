<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\File;



class DashboardController extends Controller
{
    function index()
    {
        return view('admin.dashboard');
    }
    function users()
    {
        $users =  User::get();
        return view('admin.users',compact("users"));
    }

    function usersDetail($id)
    {
        try {
            $user= User::FindOrFail($id);
            return view('admin.users-detail',compact("user"));
        } catch (\Exception $e) {
            return view('admin.pageNotFound');
        }
    }
    
    function updateUsersDetail(Request $request, $id)
    {
        $request->validate([
            'phone_number'=>'max:13',
            'company_name'=>'max:200',
            'company_no'=>'max:250',
            'director'=>'max:250',
            'address'=>'max:250',
        ]);

        $userDetails = User::find($id);
        $userDetails->phone_number = $request->phone_number;
        $userDetails->company_name = $request->company_name;
        $userDetails->company_no = $request->company_no;
        $userDetails->director = $request->director;
        $userDetails->address = $request->address;
        $userDetails->save();

        return back()->with('success-message','Updated Successfully!.');
    }

    function userDocuments($id)
    {
        try {
            $documents =  Document::get();
            $user= User::FindOrFail($id);
            return view('admin.users-documents',compact("user",'documents'));
        } catch (\Exception $e) {
            return view('admin.pageNotFound');
        }
    }

    function downloadUserDocuments($userId,$documentId)
    {
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

    function downloadAllDocuments($userId)
    {
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
