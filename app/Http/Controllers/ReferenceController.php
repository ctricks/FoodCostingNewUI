<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Datatables;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(request()->ajax()){
        return datatables()->of(CategoryModel::select('*'))
        ->addColumn('Action','category-action')
        ->rawColumns('Action')
        ->addIndexColumn()
        ->make(true);
       }
    
       return view('Reference.Category');
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
        //
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
    public function category($reference)
    {
        $reference = 'Category';
        $data = DB::table('settings')
        ->select('*') // Select all columns from both tables
        ->where('Module',$reference) 
        ->get(); 
       // dd($data);

        return view('Reference.Category',compact('data'));
    }
    public function categorystore(Request $request)
    {
         // Validate the incoming request data
        $validatedData = $request->validate([
            'Module' => 'required',
            'SettingName' => 'required',
            'Description' => 'required',
            'Value' => 'required',
            // ... other validation rules
        ]);
        

        // Create a new model instance and fill it with the validated data
        $model = new CategoryModel();

        // Redirect or return a response based on your needs
        if ($model->fill($validatedData)->save()) {
            
            $data = DB::table('settings')
            ->select('*') // Select all columns from both tables
            ->where('Module','Category') 
            ->get(); 

        return view('Reference.Category',compact('data'));

        } else {

        return redirect()->back()->withErrors(['error' => 'An error occurred while saving the data. Please try again.']);
            // An error occurred while executing th insert
            // Handle the error appropriately
            
        }

    }

    public function categoryupdate(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'Module' => 'required',
            'SettingName' => 'required',
            'Description' => 'required',
            'Value' => 'required',
        ]);

        $editItemId = $request->input('editItemId');

        $record = CategoryModel::findOrFail($request->input('editItemId'));

        if ($record->update($request->all())) {
            
            $data = DB::table('settings')
            ->select('*')
            ->where('Module','Category') 
            ->get(); 

        return view('Reference.Category',compact('data'))->with('success', 'Record updated successfully!');

        } else {

        return redirect()->back()->withErrors(['error' => 'An error occurred while saving the data. Please try again.']);
            
            
        }
    }

}
