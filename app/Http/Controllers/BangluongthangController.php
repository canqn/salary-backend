<?php

namespace App\Http\Controllers;

use App\Models\Bangluongthang;
use App\Models\Tieumuc;
use Illuminate\Http\Request;

class BangluongthangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bangluongthang::all();

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

    public function getBangluongthang($id_huyen, $id_donvi, $thang, $nam){
        $data = Bangluongthang::where([
            'id_huyen' => $id_huyen,
            'id_donvi' => $id_donvi,
            'luong_thang' => $thang,
            'luong_nam' => $nam,
        ])->get();

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bangluongthang  $bangluongthang
     * @return \Illuminate\Http\Response
     */
    public function show(Bangluongthang $bangluongthang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bangluongthang  $bangluongthang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bangluongthang $bangluongthang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bangluongthang  $bangluongthang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bangluongthang $bangluongthang)
    {
        //
    }
}
