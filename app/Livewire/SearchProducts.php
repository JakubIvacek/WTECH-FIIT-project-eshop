<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search = '';

    public function render()
    {
        if($this->search == ''){
            return view('livewire.search-products', [
                'products' => [],
            ]);
        }
        $query = '%' . $this->search . '%';
        $products = Product::where('name', 'like', $query)->get();

        return view('livewire.search-products', [
            'products' => $products,
        ]);
    }

    public function redirectToProduct($productName)
    {
        // Redirect to the desired URL
        return redirect()->to("/closeup/$productName");
    }
}
