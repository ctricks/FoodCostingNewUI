<?php

namespace App\Http\Controllers;

use App\Models\Ordering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ascending = 1; // Default to ascending order
        $branchId =  2;//auth()->user()->branchid;
       
        // $module = DB::table('settings')
        // ->select('Module') // Select all columns from both tables
        // ->groupby('Module') // Filter based on provided or request ID
        // ->get(); 

        // $Moduledata = DB::table('settings')
        // ->select('*') // Select all columns from both tables
        // ->get(); 

        // $ItemCodelist = DB::table('product')
        // ->select('ItemCode') // Select all columns from both tables
        // ->groupby('ItemCode') // Filter based on provided or request ID
        // ->get(); 

        
        $branch = DB::table('branch')
        ->select('*')
        ->get(); 

        $data = DB::select("CALL SP_CHECK_SO_ONLOAD(?, ?)", [$branchId,$ascending]); 

        return view('Ordering.createSO',compact('data','branch'));
        // return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$SONumber)
    {
        $ascending = "1"; // Default to ascending order
        $branchId = "1";//auth()->user()->branchid; // 
        $details = DB::select("CALL SP_GET_RECEIVINGITEMS_HEADERID(?,?)", [$id,$ascending]); 

        $all = "0"; 
        $ItemCode = ""; 
        $ByDesc ="";
        // $dataInv = DB::select("CALL SP_GET_ITEMINVENTORY_BRANCH(?,?,?,?)", [$branchId,$all,$ItemCode,$ByDesc]); 

        $productList = DB::table('productmasterfile')
        ->select('*')
        ->get(); 

        $paramId = $id;
        $SONumber = $SONumber;
       
        return view('Ordering.ItemList',compact('productList','details','paramId','SONumber'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
             // Validate the incoming data
             $validatedData = $request->validate([
                'SONumber' => 'required|string',
                'BranchId' => 'required|integer',
                'TotalItem' => 'required|integer',
                'TOTALQUANTITY' => 'required|integer',
                // Add more validation rules as needed
            ]);

            // Extract data from the validated request
            $data = $request->all();
            $TransactionType = "SO";
            $orderDate = now();
            $receivingDate = now();
            $totalItem = $data['TotalItem'];
            $totalqty = $data['TOTALQUANTITY'];
            $BranchId = $data['BranchId'];
            $SONumber = $data['SONumber'];

            // Call the stored procedure
            $results = DB::select('CALL SP_INSERT_TRANSACTIONHEADER(?, ?, ?, ?, ?, ?, ?,?,?)', [
                $TransactionType,
                $orderDate,
                $receivingDate,
                $totalItem,
                $totalqty,            
                1,// auth()->user()->id,
                1,
                $BranchId,// auth()->user()->branchid,
                $SONumber,// auth()->user()->branchid,
            ]);


            if ($results) {
                $ascending = 1; // Default to ascending order
                $branchId = 1;//auth()->user()->branchid; // Default to ascending order
                // Call the stored procedure
                $data = DB::select("CALL SP_CHECK_RECEIVING_ONLOAD(?, ?)", [$ascending, $branchId]); 

                return view('Receiving.createSO',compact('data'));
            } else {

            return redirect()->back()->withErrors(['error' => 'An error occurred while saving the data. Please try again.']);
                // An error occurred while executing the stored procedure
                // Handle the error appropriately
            }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = DB::select("CALL SP_GET_LAST_SO_BYBRANCH(?)", [$id]); 
        return response()->json($data);


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordering $ordering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordering $ordering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordering $ordering)
    {
        //
    }
}
