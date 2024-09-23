<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SOUploadModel;
use App\Imports\SOImport;
use Illuminate\Support\Facades\DB;

class RecUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $uploadedFileList = DB::table('so_upload_table')
        // ->select('*') // Select all columns from both tables
        // ->groupby('EXCELFILENAME') // Filter based on provided or request ID
        // ->get(); 

        return view('Receiving.UploadSO');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $so_upload_table = DB::table('so_upload_table')
        ->select('*')
        ->get(); 

        return view('Receiving.UploadSOList',compact('so_upload_table'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadFile(Request $request)
    {
        //**FROM API */
        // $baseUrl = env('APP_URL');
        // $apiUrl = $baseUrl . '/api/product/lists?';
        // $response = Http::get($apiUrl);

        // $response = DB::table('uplproduct')->get();
        //$response = DB::select('CALL SP_UPLOADFILE_STATUS');

        //  $validatedData = $request->validate([
        // 'file' => 'required|file|mimes:xlsx,xls,csv'
        // ]);
       $file = $request->file('excel_file');
       $filename = $file->getClientOriginalName();
       $import = new SOImport($filename);
    
            // if (Excel::import($import, $file)) {
            //     // Handle successful response
            //     return redirect()->back()->with([
            //         'data' => $response->collect(),
            //         'alert' => 'Data sent successfully'
            //     ]);
            // } else {
            //     // Handle error response
            //     return redirect()->back()->with('alert', 'Error sending data');
            // }

            try {
                Excel::import($import, $file);
                return redirect()->back()->with([
                    'data' => $response->collect(),
                    'alert' => 'Data sent successfully',201
                ]);
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                $errors = [];
    
                foreach ($failures as $failure) {
                    $errors[] = [
                        'row' => $failure->row(),  
    
                        'attribute' => $failure->attribute(),
                        'errors' => $failure->errors(),
                        // 'alert', 'Error sending data'
                    ];
                }
    
                return response()->json(['errors' => $errors], 422);
            } catch (\Exception $e) {
                return response()->json(['alert' => 'An error occurred,duplicate entry'], 500);
            }
    }

}
