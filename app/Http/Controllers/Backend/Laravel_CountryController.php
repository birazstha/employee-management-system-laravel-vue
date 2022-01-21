<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CountryController extends BackendBaseController
{
    protected $panel='Country';  //for section/moudule
    protected $folder='country.';  //for section/moudule
    protected $base_route='country.'; //for route method
    protected $title;
    protected $model='Country';

    function __construct(){
        $this->model=new Country();
    }

    public function index(Request $request){
        $this->title='List';
        $data['rows']=$this->model->all();
        if($request->has('search')){
            $data['rows'] = $this->model->where('name','like',"%{$request->search}%")->orWhere('country_code','like',"%{$request->search}%")->get();
        }
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }

    public function create(){
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));

    }

    public function store(CountryStoreRequest $request){
//        dd($request->all());
          $data['row']=$this->model->create($request->all());
        if($data['row']) {
            $request->session()->flash('success',$this->panel.' successfully added');
        }
        else {
            $request->session()->flash('error','Error in adding'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }

    public function show($id){
        //
    }


    public function edit($id){
        $this->title='Edit';
        $data['row']=$this->model->find($id);
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));

    }

    public function update(Request $request, $id){
        $data['row']=$this->model->find($id);
        $data['row']->update($request->all());
        if($data['row']) {
            $request->session()->flash('success',$this->panel.' successfully updated');
        }
        else {
            $request->session()->flash('error','Error in updating'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }

    public function destroy($id){
        $data['row']=$this->model->find($id);
        $data['row']->delete();
        if($data['row'])
        {
            request()->session()->flash('success',$this->panel.' successfully deleted');
        }
        else
        {
            request()->session()->flash('error','Error in deleting'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }

    public function changePassword(Request $request,User $user){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpassword' => ['required', 'same:password'],
        ]);

        $data['row'] = $user->update(['password'=>Hash::make($request->password)]);
        if($data['row']) {
            $request->session()->flash('success','Password successfully changed');
        }
        else {
            $request->session()->flash('error','Error in changing'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }

}
