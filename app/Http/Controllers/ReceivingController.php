<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use PDO;
use DataTables;

use Illuminate\Http\Request;

class ReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ascending = 1; // Default to ascending order
        $branchId =  1;//auth()->user()->branchid;
       
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

        $data = DB::select("CALL SP_CHECK_RECEIVING_ONLOAD(?, ?)", [$ascending, $branchId]); 

        return view('Receiving.createSO',compact('data','branch'));
        // return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$Total_Item,$SONumber)
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
        $Total_Item = $Total_Item;
        $SONumber = $SONumber;
       
        return view('Receiving.ItemList',compact('productList','details','paramId','Total_Item','SONumber'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Extract data from the validated request
        $data = $request->all();
        $ReceivingDate = $data['ReceivingDate'];
        $ExpirationDate = $data['ExpirationDate'];
        $itemCodeH = $data['ItemCodeH'];
        $PO_QTY = "2";//$data['PO_QTY'];
        $REC_QTY = $data['REC_QTY'];
        $Remarks = $data['Remarks'];
        $paramId = $data['paramId'];
        $Barcode = $data['Barcode'];

        dd($data);

         // Call the stored procedure
         $results = DB::select('CALL SP_INSERT_RECEIVINGITEMS(?, ?, ?, ?, ?, ?, ?, ?, ? ,?)', [
            $paramId,
            $itemCodeH,
            $PO_QTY,
            $REC_QTY,
            1,
            1,
            $Remarks,
            $ExpirationDate,
            $ReceivingDate,
            $Barcode
        ]);
        //dd($results);

        if ($results) {
            
            $ascending = 1; // Default to ascending order
            $branchId = 1;//auth()->user()->branchid; // Default to ascending order
            // Call the stored procedure
            $data = DB::select("CALL SP_CHECK_RECEIVING_ONLOAD(?, ?)", [$ascending, $branchId]); 

            return view('Receiving/itemList', compact('data'));
        } else {

        // dd("error");
        return redirect()->back()->withErrors(['error' => 'An error occurred while saving the data. Please try again.']);
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('productmasterfile')
        ->select('*') // Select all columns from both tables
        ->where('ID',$id) 
        ->first(); 
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Product not found or missing InventoryID'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transactionId)
    {
        // Retrieve the updated data from the request
        $updatedData = $request->all();
    dd($updatedData);       
        // Prepare the data for the stored procedure
        $spData = [
            'DetailsID' => $transactionId,
            'RECQTY' => $updatedData['REC_QTY'],
            'RecUSERID' => "1",
            'Rem' => $updatedData['Remarks'],
            'ExpDate' => now(),
            'Rem' => $updatedData['Remarks'],
            'RecDate' => $updatedData['ReceivingDate'],
        ];

        // Call the stored procedure
        DB::statement('CALL SP_EDIT_TRANSACTIONDETAILS(?, ?, ?, ?, ?, ?, ?)', $spData);
        // Return a success response or redirect to the desired page
        return response()->json(['message' => 'Transaction updated successfully']);
    }

    public function storePO(Request $request)
        {
            // Extract data from the validated request
            $data = $request->all();
            $TransactionType = "REC";
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getExpiry($id)
    {
        // dd($id);
        $data = DB::table('transactiondetails_expiry')
        ->select('REC_Qty','Expiration_date') // Select all columns from both tables
        ->where('transactionid',$id) 
        ->get(); 
//dd($data);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['error' => 'Product not found or missing InventoryID'], 404);
        }
    }
}
