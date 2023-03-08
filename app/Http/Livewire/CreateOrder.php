<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Livewire\Component;

class CreateOrder extends Component
{
    public $departments, $cities = [], $districts = [];

    public $envio_type = 1;
    public $contact, $phone, $address, $reference;
    public $department_id= "";
    public $city_id = "";
    public $district_id = "";

    public function mount()
    {
        $this->departments = Department::all();
    }
    public function render()
    {
        return view('livewire.create-order');
    }
}
