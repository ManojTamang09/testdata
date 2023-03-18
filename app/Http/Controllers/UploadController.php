<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Jobs\ProcessExcelJob;
use App\Models\Upload;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch=Upload::paginate(70);
        // dd($fetch);

        return view('view',compact('fetch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file'=>'required',
        ]);
        // $name = time().'.'.request()->file->getClientOriginalExtension();
        // Excel::import(new UsersImport,request()->file);
        // $filePath=$request->all();
        // $data=$request->all();
        // if ($request->hasFile('file')) {
        //     //  Let's do everything here
        //     if ($request->file('file')->isValid()) {
        //         //
        //         $fileName = "excelupload-"  . request()->file('file');
        //         $ext = $request->file('file')->getClientOriginalExtension();

        //         // $request->file->storeAs('excelupload', $fileName);
        //         $filetotal=$fileName.$ext;
        //         $fileName=$request->file->move(public_path('excelupload'),$fileName.$ext);

        //          $data['file']=$fileName;

        //     }
        // }

                    $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('excelupload'), $filename);
                $filePath = '/excelupload/' . $filename;



        // dd($filePath);'
        // ProcessExcelJob::dispatch($filePath)->onQueue('excel-processing');
        $job=dispatch(new ProcessExcelJob($filePath));


        // ProcessExcelJob::dispatch($filePath);
        // $job = new ProcessExcelJob($filePath);

        // Dispatch the job to the queue
        DB::table('jobs')->insert([
            'queue' => 'excel-processing',
            'payload' => json_encode($job),
            'attempts' => 0,
            'reserved_at' => null,
            'available_at' => now()->timestamp,
            'created_at' => now()->timestamp,
            'excel_file' => basename($filePath), // Set the name of the Excel file being processed
        ]);
        return back()->with('message','Data imported successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
