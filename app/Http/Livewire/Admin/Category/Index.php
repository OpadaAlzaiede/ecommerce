<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public function deleteCategory($id) {

        $this->categoryId = $id;
    }

    public function destoryCategory() {

        $category = Category::find($this->categoryId);
        $path = 'uploads/category/' . $category->image;

        if(File::exists($path)) File::delete($path);

        $category->delete();

        session()->flash('message', Config::get('constants.Category.delete'));
        $this->dispatchBrowserEvent('close-modal');
    }
}
