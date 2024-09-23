<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\detailsExpiration;


use Illuminate\Http\Request;

class RecApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ascending = 1; // Default to ascending order
        $branchId = 1;//auth()->user()->branchid;
       
        $data = DB::select("CALL SP_CHECK_RECEIVING_ONLOAD(?, ?)", [$ascending, $branchId]); 

        return view('Receiving.ApprovalRec',compact('data'));
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
        // Extract data from the validated request
        $data = $request->all();

        // $inserData =[
        //             $transactionId = $data['transactionId'],
        //             $REC_Qty = $data['REC_Qty'],
        //             $Expiration_date = $data['Expiration_date'],
        //             $id = 1,
        //             $ranch = 1,
        // ];
             

        // $result = DB::table('transactiondetails_expiry')->insert($data);

        
        $result = new detailsExpiration;
        $result->transactionId = $data['transactionId'];
        $result->REC_Qty = $data['REC_Qty'];
        $result->Expiration_date = $data['Expiration_date'];
        $result->ItemCode = $data['itemCode'];
        $result->Added_by = 1;
        $result->branch_id = 1;
        $result->updated_at =now();
        $result->created_at =now();


        $result->save();
        return redirect()->back()->withInput()->with('success', 'Expiration date inserted successfully.');


        // if ($$result->save()) {
            
        //     $ascending = 1; // Default to ascending order
        //     $branchId = 1;//auth()->user()->branchid; // Default to ascending order
        //     // Call the stored procedure
        //     $data = DB::select("CALL SP_CHECK_RECEIVING_ONLOAD(?, ?)", [$ascending, $branchId]); 
        //     return redirect()->back()->withInput()->with('success', 'Expiration date inserted successfully.');;
        //     // return view('Receiving.createSO',compact('data'));
        // } else {

        // return redirect()->back()->withErrors(['error' => 'An error occurred while saving the data. Please try again.']);
            // An error occurred while executing the stored procedure
            // Handle the error appropriately
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
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|integer',
            'id' => 'required|integer'
        ]);

        $status = $validatedData['status'];
        $id = $validatedData['id'];
        $remarks ="";
        $ascending ="0";

        try {
           
            $result = DB::select('CALL SP_UPDATE_TRANSACTIONDETAILS_APPROVED(?, ?, ?, ?)', [
                $id,
                $status, 
                1,//auth()->user()->id,
                $remarks
            ]);

            $updatedData = [];
            if (count($result) > 0) {
                // dd($result);
                return response()->json([
                    'message' => $result,
                ]);
            }

        } catch (Exception $e) {
        // Handle potential database or other errors
        return response()->json(['message' => 'Error updating status: ' . $e->getMessage()], 500);
        }
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

    public function approval($id)
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
       
        return view('Receiving.ApprovalRecList',compact('productList','details','paramId'));

    }
}