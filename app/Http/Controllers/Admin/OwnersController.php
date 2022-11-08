<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner; //エロクエント
use Illuminate\Support\Facades\DB; //queryBuilder
Use Carbon\Carbon;
use Illuminate\Support\Facades\Hash; 

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     public function __construct()
     {
        $this->middleware('auth:admin');
     }

     public function index()
     {
        // $date_now = Carbon::now();
        // $date_perse = Carbon::parse(now());
        // echo $date_now."</br>"; //echo $date_now->yearで年だけなど使いやすい
        // //echo $date_perse;

        // $e_all = Owner::all();
        // $q_get= DB::table('owners')->select('name','created_at')->get();
        // //$q_first = DB::table('owners')->select('name')->first();
        // $c_test = collect([
        //     'name' => 'テスト',
        // ]);
        
        // var_dump($q_first);

        // dd($e_all,$e_get,$q_first,$c_test);

        $owners=Owner::select('name','email','created_at')->get();
        return view('admin.owners.index', 
        compact('owners')); //compactを使うことで変数をview側に渡すことができる
     }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->name; (名前取得)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required','string','confirmed','min:8',],
        ]);

        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
        ->route('admin.owners.index')
        ->with('message','オーナー登録を実施しました');
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
}
