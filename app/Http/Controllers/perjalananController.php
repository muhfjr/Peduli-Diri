<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class perjalananController extends Controller
{
    Public function Perjalanan(){
        return view('layouts.inputperjalanan');
    }

    Public function simpanPerjalanan(Request $request){
        $data=[
            'id_user'=>auth()->user()->id,
            'tanggal'=>$request->tanggal,
            'jam' =>$request->jam,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu
        ];

        // dd($data;)
        Perjalanan::create($data);

        return redirect('dataperjalanan');
    }

    // public function __construct()
    // {
    //     $this->middleware('authcek');

    // }

    Public function index(){
        $perjalanan = perjalanan::all();
        $data = perjalanan::where('id_user', auth()->user()->id)->paginate(10);

        return view('layouts.dataperjalanan',['data'=>$data]);
}

Public function searchPerjalanan(Request $request){
    if(!empty($request->input('tanggal'))&& empty($request->input('jam'))&& empty($request->input('lokasi'))&& empty($request->input('suhu'))) {
        $search=$request->tanggal;
        $data = perjalanan::where('id_user', auth()->user()->id)
            ->where('perjalanans.tanggal', 'LIKE', $search)
            ->paginate(10)
            ->withQueryString();

        $data->appends($request->input());
            if ($data) {
                return view('layouts.dataperjalanan',['data'=>$data]);
            }else{
                abort(404);
            }
    }elseif(empty($request->input('tanggal'))&& !empty($request->input('jam'))&& empty($request->input('lokasi'))&& empty($request->input('suhu'))){
        $search=$request->jam;
        $data = perjalanan::where('id_user', auth()->user()->id)
            ->where('perjalanans.jam', 'LIKE', $search)
            ->paginate(10)
            ->withQueryString();

        $data->appends($request->input());
                if ($data) {
                    return view('layouts.dataperjalanan',['data'=>$data]);
                }else{
                    abort(404);
                }
        }elseif(empty($request->input('tanggal'))&& empty($request->input('jam'))&& !empty($request->input('lokasi'))&& empty($request->input('suhu'))){
            $search=$request->lokasi;
            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.lokasi', 'LIKE', $search)
                ->paginate(10)
                ->withQueryString();

            $data->appends($request->input());
                    if ($data) {
                        return view('layouts.dataperjalanan',['data'=>$data]);
                    }else{
                        abort(404);
                    }
        }elseif(empty($request->input('tanggal'))&& empty($request->input('jam'))&& empty($request->input('lokasi'))&& !empty($request->input('suhu'))){
            $search=$request->suhu;
            $data = perjalanan::where('id_user', auth()->user()->id)
                ->where('perjalanans.suhu', 'LIKE', $search)
                ->paginate(10)
                ->withQueryString();

            $data->appends($request->input());
                    if ($data) {
                        return view('layouts.dataperjalanan',['data'=>$data]);
                    }else{
                        abort(404);
                    }
        }
    }

    Public function Order(Request $request){
        if ($request->input('tanggalDesc') == "Desc") {
        $sorted = perjalanan::where('id_user', auth()->user()->id)
            ->orderByDesc('tanggal')
            ->paginate(10)
            ->withQueryString();
            return view('layouts.dataperjalanan', ['data' => $sorted]);
            } elseif ($request->input('tanggalAsc') == "Asc") {
        $sorted = perjalanan::where('id_user', auth()->user()->id)
            ->orderBy('tanggal')
            ->paginate(10)
            ->withQueryString();
            return view('layouts.dataperjalanan', ['data' => $sorted]);
            } elseif ($request->input('jamDesc') == "Desc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('jam')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);
                    } elseif ($request->input('jamAsc') == "Asc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('jam')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);

            }  elseif ($request->input('lokasiDesc') == "Desc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('lokasi')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);
                    } elseif ($request->input('lokasiAsc') == "Asc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('lokasi')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);
            }  elseif ($request->input('suhuDesc') == "Desc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderByDesc('suhu')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);
                    } elseif ($request->input('suhuAsc') == "Asc") {
                $sorted = perjalanan::where('id_user', auth()->user()->id)
                    ->orderBy('suhu')
                    ->paginate(10)
                    ->withQueryString();
                    return view('layouts.dataperjalanan', ['data' => $sorted]);
    }
}
public function deletePerjalanan(Request $request){
    $delete = $request->delete;
    $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
    ->Where(function ($query) use($delete) {
            $query->where('users.id', auth()->user()->id)
                    ->where('perjalanans.id',$delete);
    })
    ->get(['perjalanans.*']);

    Perjalanan::destroy($data);
    return redirect('/dataperjalanan');}}
    //     $cari=$request->search;

    //     $data = User::join('perjalanans', 'perjalanans.id_user', '=', 'users.id')
    //     ->orWhere(function ($query) use($cari){
    //         $query->where('users.id', auth()->user()->id)
    //             ->where('perjalanans.lokasi', $cari);
    //     })->orWhere(function ($query) use($cari){
    //         $query->where('users.id', auth()->user()->id)
    //             ->where('perjalanans.tanggal',date('Y-m-d',strtotime($cari)));
    //     })->orWhere(function ($query) use($cari){
    //         $query->where('users.id', auth()->user()->id)
    //             ->where('perjalanans.jam', $cari);
    //     })->orWhere(function ($query) use($cari){
    //         $query->where('users.id', auth()->user()->id)
    //             ->where('perjalanans.suhu', $cari);
    //     })
    //     ->get(['users.id', 'perjalanans.*']);
    // if ($data) {
    //     return view('layouts.dataperjalanan', ['data'=>$data])->with('message', 'data di temukan');
    // }else{
    //     abort(404);
    // }
