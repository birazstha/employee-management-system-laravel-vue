<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends BackendBaseController
{
    protected $panel='User';  //for section/moudule
    protected $folder='user.';  //for section/moudule
    protected $base_route='user.'; //for route method
    protected $title;
    protected $model='User';

    function __construct(){
        $this->model=new User();
    }

    public function index(Request $request){
        $this->title='List';
        $data['rows']=$this->model->all();
        if($request->has('search')){
            $data['rows'] = $this->model->where('username','like',"%{$request->search}%")->orWhere('email','like',"%{$request->search}%")->get();
        }
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }

    public function create(){
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));

    }

    public function store(UserStoreRequest $request){
        $request->request->add(['password'=>Hash::make($request->input('password'))]);
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
