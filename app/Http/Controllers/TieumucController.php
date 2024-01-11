<?php

namespace App\Http\Controllers;

use App\Models\Tieumuc;
use App\Http\Requests\StoreTieumucRequest;
use App\Http\Requests\UpdateTieumucRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TieumucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tieumuc::all();

        if($data->count() > 0) {
            return response([
                'status' =>200,
                'data'=> $data
            ],200);
        }else{
            return response([
                'status' =>404,
                'message'=> 'No Record found',
            ],200);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responses
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matieumuc'=> 'required|string|max:191',
            'tentieumuc'=>'required|string|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }else{
            $data = Tieumuc::create([
                'matieumuc'=> $request->matieumuc,
                'tentieumuc'=>$request->tentieumuc,
            ]);

            if ($data) {
                return response()->json([
                    'status'=> 200,
                    'message'=> "Created Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'=> 500,
                    'message'=> "Something went wrong"
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tieumuc  $tieumuc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tieumuc::find($id);
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No such found!"
            ],404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'matieumuc'=> 'required|string|max:191',
            'tentieumuc'=>'required|string|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }else{
            $data = Tieumuc::find($id);

            if ($data) {
                $data -> update([
                    'matieumuc'=> $request->matieumuc,
                    'tentieumuc'=>$request->tentieumuc,
                ]);

                return response()->json([
                    'status'=> 200,
                    'message'=> "Updated Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> "No such found"
                ], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tieumuc  $tieumuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tieumuc::find($id);
        if($data)
        {
            $data->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Not Found.'
            ]);
        }
    }
}
