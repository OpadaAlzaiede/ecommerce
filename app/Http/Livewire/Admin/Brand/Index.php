<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Index extends Component
{
    public $name, $slug, $status;

    public function rules() {

        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:100'],
            'status' => ['nullable']
        ];
    }

    public function resetInput() {

        $this->name = null;
        $this->slug = null;
        $this->status = null;
    }

    public function render()
    {
        return view('livewire.admin.brand.index')
                    ->extends('layouts.admin')
                    ->section('content');
    }

    public function storeBrand() {

        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);

        session()->flash('message', Config::get('constants.BRAND.add'));
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
}
