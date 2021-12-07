<?php

namespace App\Http\Livewire;

use  Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Employee;
use App\Models\adminslist;

class Employees extends Component
{
    public $employee,$employee_name,$employee_address,$employee_id;
    public $upd_employee,$upd_employee_name,$upd_employee_address,$upd_employee_id,$cid;
    public $name,$pass,$cpass;
    public $username, $password;
    public $photo;
    protected $listeners = ['delete'];

    public function render()
    {
        return view('livewire.employees',[
              'employees' => Employee::orderBy('employee_name','asc')->get(),
              'adminslists' => adminslist::orderBy('name','asc')->get()
        ]);
    }
    public function OpenAddEmployeeModal(){
        $this->dispatchBrowserEvent('OpenAddEmployeeModal');
    }
    public function save(){
        $this->validate([
             'employee' => 'required',
             'employee_name' => 'required',
             'employee_address' => 'required',
             'employee_id' => 'required|unique:employees',
        ]);

        $save = Employee::insert([
              'employee_name' => $this->employee_name,
              'address' => $this->employee_address,
              'employee_id' => $this->employee_id,
        ]);
        if($save){
            $this->dispatchBrowserEvent('CloseAddEmployeeModal');
        }
    }
    public function OpenEditEmployeeModal($id){
                $upd = Employee::find($id);
                $this->upd_employee_name = $upd->employee_name;
                $this->upd_employee_address = $upd->address;
                $this->upd_employee_id = $upd->employee_id;
                $this->cid = $upd->id;
               $this->dispatchBrowserEvent('OpenEditEmployeeModal',[
                   'id' => $id
               ]);
    }
    public function update(){
        $cid = $this->cid;
        $this->validate([
             'upd_employee' => 'required',
             'upd_employee_name' => 'required',
             'upd_employee_address' => 'required',
             'upd_employee_id' => 'required|unique:employees,employee_id,'.$cid,
        ],[
            'upd_employee.required' => 'you must select role',
            'upd_employee_name.required' => 'you must enter name',
            'upd_employee_address.required' => 'you must enter address',
            'upd_employee_id.unique' => 'employee id already exists'
        ]);

        $update =  Employee::find($cid)->update([
              'employee_name' => $this->upd_employee_name,
              'address' => $this->upd_employee_address,
              'employee_id' => $this->upd_employee_id,
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditEmployeeModal');
        }
    }
    public function deleteconfirm($id){
        $upd = Employee::find($id);
        $this->dispatchBrowserEvent('swalconfirm',[
             'title' => 'Are you sure?',
             'html'=>'you want to delete <strong>'.$upd->employee_name.'</strong>',
             'id' => $id
        ]);
    }
    public function delete($id){
      $del = Employee::find($id)->delete();
      if($del){
          $this->dispatchBrowserEvent('deleted');
      }
    }
    public function showlogin(){
        $this->dispatchBrowserEvent('showlogin');
    }
    public function showsignup(){
         $this->dispatchBrowserEvent('showsignup');
    }
    public function register(){
          $validatorData = \validator::make($this->state,[
             'name' => 'required|unique:adminslists',
             'pass' => 'required',
             'cpass' => 'required|same:pass',
          ]); 
             
            

            if($this->photo){
                 $validatorData['avatars'] = $this->photo->store('/', 'avatars');
            }
            
            $register = adminslist::insert([
                'name' => $this->name,
                
                'pass' => \Hash::make($this->pass)

            ]);
            if($register){
                 $this->dispatchBrowserEvent('registervalidate');
            }
    }
    public function check(){
         $this->validate([
             'username' => 'required|exists:adminslists',
             'password' => 'required',
            
         ],[
             'username.exists' => 'this is email do not exists on user table'

         ]);
        $login =  adminslist::select('select * from adminslists WHERE name = "$this->username" AND pass = "$this->password" ');
        if( $login){
            $this->dispatchBrowserEvent('registervalidate');
        }
    }
}
