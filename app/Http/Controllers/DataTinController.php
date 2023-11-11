<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\News;
use App\Models\NguonTin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DataTinController extends Controller
{
    function DataTableIndex()
    {
        $datatin=TinTuc::all();
            return view('qltintuc.duyettin',[
                'lenform'=>$datatin
            ]);  
    }

    function DataNguonTinTheLoai()
    {
        $datanguontintheloai=NguonTin::all();
        // select(DB::raw("CONCAT(linknguon,'', linktheloai) as linktintuc"))
        // ->join('TheLoai','TheLoai.MaNguon','=','NguonTin.MaNguon')
        // ->get();
        return view('qltintuc.tintuc',[
            'formnguontintheloai'=>$datanguontintheloai
        ]);
    }
    
    function timDanhmuc(Request $request)
    {
        $LinkNguon = $request->input('LinkNguon');
        return view('qltintuc.danhmuc',[
            'danhmuc'=>$LinkNguon
        ]);
    }
    // function timNguonTin(Request $request)
    // {
    //     $LinkNguon = $request->input('LinkNguon');
    //     return view('qltintuc.tintucdanhmuc',[
    //         'tindanhmuc'=>$LinkNguon
    //     ]);
    // }

    // function timLinkDanhmuc(Request $request)
    // {
    //     $LinkNguon = $request->input('LinkNguon');
    //     return view('qltintuc.tintucdanhmuc',[
    //         'tintucdanhmuc'=>$LinkNguon
    //     ]);
    // }
    function DataNguon()
    {
        // $datanguon=NguonTin::select('TenNguon','LinkNguon','TenTheLoai','LinkTheLoai')
        // ->join('TheLoai','TheLoai.MaNguon','=','NguonTin.MaNguon')
        // ->get();
        // return view('qltintuc.duyetnguon',[
        //     'formnguon'=>$datanguon
        // ]);
        $datanguon=NguonTin::all();
            return view('qltintuc.duyetnguon',[
            'formnguon'=>$datanguon
        ]);
    }
    public function xoa(Request $request)
    {
        $MaNguon = $request->get('MaNguon');
        NguonTin::destroy($MaNguon);
        return back();
    }
    function insertNguon(Request $request)
    {
        $TenNguon = $request->input('tennguon');
        $LinkNguon = $request->input('linknguon');
        $TenThe = $request->input('tenthe');
        $LinkThe = $request->input('linkthe');
        $HrefThe = $request->input('hrefthe');
        $LinkRss = $request->input('linkrss');
        $TheContent=$request->input('thecontent');
        $isInsertSuccress = NguonTin::insert([
            'tennguon'=> $TenNguon,
            'linknguon' => $LinkNguon,
            'tenthe'=> $TenThe,
            'linkthe' => $LinkThe,
            'hrefthe'=>$HrefThe,
            'linkrss'=> $LinkRss,
            'thecontent'=>$TheContent
        ]);
        return redirect('duyetnguon');
    }

    function insertTin(Request $request)
    {
        $Item = $request->input('item');
        $Link = $request->input('link');
        $Description = $request->input('description');
        $Status = $request->input('status');
        $MaTheLoai = $request->input('matheloai');

        $isInsertSuccress = TinTuc::insert([
            'item'=> $Item,
            'link' => $Link,
            'description' => $Description,
            'status' => $Status,
            'matheloai' => $MaTheLoai
        ]);
        if($isInsertSuccress) {
            echo '<script>alert("Success")</script>';
            return redirect('qltintuc');
        } else {
            echo '<script>alert("Failed")</script>';
            return redirect('qltintuc');
        }
    }
}
