<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kirim;
use App\Models\Chiqim;
use App\Models\Baza;
use App\Models\Type;
use App\Models\Tranzaksiya;
use DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
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

    /*-----KIRIM-----*/

    public function index_kirim()
    {
        return view('kirim.kirim');
    }

    public function store_kirim(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'cost' => 'required',
            'type' => 'required',
        ]);

        $element = Kirim::where('name', $request->get('name'))->first();

        $sum = $request->input('amount')*$request->input('cost');
        
        if($element){
            $kirim = new Kirim();
            $kirim->name = $request->input('name');
            $kirim->amount = $request->input('amount')+$element->amount;
            $kirim->cost = $request->input('cost');
            $kirim->summ = $sum+$element->summ;
            $kirim->type = $request->input('type');

            DB::update('UPDATE kirims SET name = ?, amount = ?, cost = ?, summ = ?, type = ? WHERE id = ?', 
            [$kirim->name, $kirim->amount, $kirim->cost, $kirim->summ, $kirim->type, $element->id]);

        }else{

        $kirim = new Kirim([
            'name' => $request->get('name'),
            'amount' => $request->get('amount'),
            'cost' => $request->get('cost'),
            'summ' => $request->get('amount')*$request->get('cost'),
            'type' => $request->get('type')
        ]);
        
            $kirim->save();
        }

            $tranzaksiya = new Tranzaksiya([
                'name' => $request->get('name'),
                'amount' => $request->get('amount'),
                'cost' => $request->get('cost'),
                'summ' => $request->get('amount')*$request->get('cost'),
                'type' => $request->get('type'),
                'io_type' => "Kirim",
            ]);
        
            $tranzaksiya->save();
            
        /*-----BAZA-----*/
        $element_baza = Baza::where('name', $request->get('name'))->first();
        $sum_baza = $request->input('amount')*$request->input('cost');
            
        if($element_baza){
            $baza = new Baza();
            $baza->name = $request->input('name');
            $baza->amount = $request->input('amount')+$element_baza->amount;
            $baza->cost = $request->input('cost');
            $baza->summ = $sum_baza+$element_baza->summ;
            $baza->type = $request->input('type');

            DB::update('UPDATE bazas SET name = ?, amount = ?, cost = ?, summ = ?, type = ? WHERE id = ?', 
            [$baza->name, $baza->amount, $baza->cost, $baza->summ, $baza->type, $element_baza->id]);

        }else{

            $baza = new Baza([
                'name' => $request->get('name'),
                'amount' => $request->get('amount'),
                'cost' => $request->get('cost'),
                'summ' => $request->get('amount')*$request->get('cost'),
                'type' => $request->get('type')
            ]);
            
            $baza->save();
        }

            $request->session()->flash('success',"Success");
            return redirect('/kirim');
    }

    public function show_kirim()
    {
        $data = kirim::all();
        return view('kirim.kirim_select', ['datas' => $data]);
    }

    /*-----CHIQIM-----*/

    public function index_chiqim()
    {
        return view('chiqim.chiqim');
    }

    public function store_chiqim(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',
            'cost' => 'required',
            'type' => 'required',
        ]);

        $element_chiqim = Chiqim::where('name', $request->get('name'))->first();
        $element_chiqim_baza= Baza::where('name', $request->get('name'))->first();
        
        $sum_chiqim = $request->input('amount')*$request->input('cost');
        $sum_chiqim_baza = $request->input('amount')*$request->input('cost');
        
        if($element_chiqim_baza && $element_chiqim_baza->amount-$request->get('amount') >= 0){
            
            if($element_chiqim){
                $chiqim = new Chiqim();
                $chiqim->name = $request->input('name');
                $chiqim->amount = $element_chiqim->amount+$request->input('amount');
                $chiqim->cost = $request->input('cost');
                $chiqim->summ = $sum_chiqim+$element_chiqim->summ;
                $chiqim->type = $request->input('type');

            DB::update('UPDATE chiqims SET name = ?, amount = ?, cost = ?, summ = ?, type = ? WHERE id = ?', 
            [$chiqim->name, $chiqim->amount, $chiqim->cost, $chiqim->summ, $chiqim->type, $element_chiqim->id]);
            }else{
                $chiqim = new Chiqim([
                'name' => $request->get('name'),
                'amount' => $request->get('amount'),
                'cost' => $request->get('cost'),
                'summ' => $request->get('amount')*$request->get('cost'),
                'type' => $request->get('type')
            ]);
                $chiqim->save();
            }
            
            $baza = new Baza();
            $baza->name = $request->input('name');
            $baza->amount = $element_chiqim_baza->amount - $request->input('amount');
            $baza->cost = $request->input('cost');
            $baza->summ = $element_chiqim_baza->summ - $sum_chiqim_baza;
            $baza->type = $request->input('type');

            DB::update('UPDATE bazas SET name = ?, amount = ?, cost = ?, summ = ?, type = ? WHERE id = ?', 
            [$baza->name, $baza->amount, $baza->cost, $baza->summ, $baza->type, $element_chiqim_baza->id]);
        }else{
                $request->session()->flash('error',"Mahsulot topilmadi yoki Miqdor yetmadi");
                return redirect('/chiqim');
            }

            $tranzaksiya = new Tranzaksiya([
                'name' => $request->get('name'),
                'amount' => $request->get('amount'),
                'cost' => $request->get('cost'),
                'summ' => $request->get('amount')*$request->get('cost'),
                'type' => $request->get('type'),
                'io_type' => "Chiqim",
            ]);

            $tranzaksiya->save();
            $request->session()->flash('success',"Success");
            return redirect('/chiqim');
    }

    public function show_chiqim()
    {
        $data = chiqim::all();
        return view('chiqim.chiqim_select', ['datas' => $data]);
    }

    /*-----TRANZAKSIYA-----*/

    public function show_tranzaksiya()
    {
        $data = tranzaksiya::all();
        return view('tranzaksiya', ['datas' => $data]);
    }
   
    /*-----BAZA-----*/

    public function show_baza($type)
    {
        $datas = baza::all();
        $b_type = type::all();
        $pro = array();
        if($type == 'All'){
            return view('baza', ['datas' => $datas , 'types' => $b_type]);
        }
        foreach($datas as $data){
            if($data->type == $type){
                $pro[] = $data;
            }
        }
        return view('baza', ['datas' => $pro, 'types' => $b_type]);
    }

    public function index_type()
    {
        return view('type');
    }

    public function store_type(Request $request)
    {
        $this->validate($request,[
            'type' => 'required'
        ]);

        $type = new Type([
            'name' => $request->get('type')
        ]);
        
        $type->save();
        $request->session()->flash('success',"Success");
        return redirect('/type');
    }

    public function search(Request $request)
    {
        $type = type::all();
        $search_name = $_GET['name'];
        $products = baza::where('name', 'LIKE', '%' .$search_name. '%')->get();
        return view('baza', ['datas' => $products, 'types' => $type]);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
