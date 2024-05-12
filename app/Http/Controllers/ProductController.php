<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get products
        $query = Product::query();

        // Apply filters or sort if added
        // Color Filtering
        if ($request->has('color')) {
            $color = $request->input('color');
            $query->where('color', strtolower($color));
        }
        // Size Filtering
        if ($request->has('size')) {
            $size = $request->input('size');
            $query->whereHas('sizes', function ($q) use ($size) {
                $q->where('size', $size);
            });
        }
        // Price Filtering
        if ($request->has('price')) {
            $price = $request->input('price');
            $query->where('price', '<=', $price);
        }
        // Sorting
        if ($request->has('sort')) {
            $sortOption = $request->input('sort');
            switch ($sortOption) {
                case 1:
                    $query->orderBy('price', 'asc');
                    break;
                case 2:
                    $query->orderBy('price', 'desc');
                    break;
                case 3:
                    $query->orderBy('name', 'asc');
                    break;
            }
        }

        $products = $query->paginate(15);

        return view('product\index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'nothing';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric|min:0',
            'color' => 'required|string|max:255',
            'type' => 'required|in:t-shirt,sweatshirt',
            'photos' => 'required|array|size:3',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'size_S' => 'required|integer|min:0',
            'size_M' => 'required|integer|min:0',
            'size_L' => 'required|integer|min:0',
            'size_XL' => 'required|integer|min:0',
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = "description";
        $product->color = $validatedData['color'];
        $product->category = $validatedData['type'];
        $product->save();

        // Handle product images upload files
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $hashedFilename = Str::random(40) . '.' . $photo->getClientOriginalExtension(); // Generate a hashed filename
                $path = $photo->move(public_path('img/products'), $hashedFilename);
                $relativePath = str_replace([public_path(), DIRECTORY_SEPARATOR], ['', '/'], $path);
                // Store the path in db
                $product->images()->create(['imgsrc' => $relativePath]);
            }
        }

        // Handle product sizes
        $sizes = ['S', 'M', 'L', 'XL'];
        foreach ($sizes as $size) {
            $sizeInputName = 'size_' . $size;
            if ($request->has($sizeInputName)) {
                $product->sizes()->create([
                    'size' => $size,
                    'count' => $validatedData[$sizeInputName], // Use the validated data
                ]);
            }
        }

        // Redirect back with success message
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'photos' => 'required|array|size:3',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'size_S' => 'required|integer|min:0',
            'size_M' => 'required|integer|min:0',
            'size_L' => 'required|integer|min:0',
            'size_XL' => 'required|integer|min:0',
        ]);

        $product = Product::find($validatedData['id']);

        // Update the product attributes based on the request data
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];

        // Handle product sizes
        $sizes = ['S', 'M', 'L', 'XL'];
        foreach ($sizes as $size) {
            $sizeInputName = 'size_' . $size;
            if ($request->has($sizeInputName)) {
                // Update existing size count if exist
                $productSize = $product->sizes()->where('size', $size)->first();
                if ($productSize) {
                    $productSize->count = $validatedData[$sizeInputName];
                    $productSize->save();
                } else {
                    // Create new size entry
                    $product->sizes()->create([
                        'size' => $size,
                        'count' => $validatedData[$sizeInputName],
                    ]);
                }
            }
        }

        // Handle image uploads
        if ($request->hasFile('photos')) {
            // Delete existing images
            foreach ($product->images as $image) {
                File::delete(public_path($image->imgsrc));
                $image->delete();
            }
            // Upload new images
            foreach ($request->file('photos') as $photo) {
                $hashedFilename = Str::random(40) . '.' . $photo->getClientOriginalExtension(); // Generate a hashed filename
                $path = $photo->move(public_path('img/products'), $hashedFilename);
                $relativePath = str_replace([public_path(), DIRECTORY_SEPARATOR], ['', '/'], $path);
                // Store the path in db
                $product->images()->create(['imgsrc' => $relativePath]);
            }
        }

        // Save the updated product
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product modified successfully.');
    }




    public function show($id)
    {
        $product = Product::with('sizes')->findOrFail($id);
        return view('/product/show', ['product' => $product]);
    }

    public function cart(Request $request)
    {
        // Retrieve and parse JSON data from the request body
        $requestData = $request->json()->all();

        // Check if 'ids' key exists in the request data
        if(isset($requestData['ids'])) {
            // Retrieve IDs from the request data
            $ids = $requestData['ids'];

            // Perform your logic here to fetch products based on the IDs
            $products = Product::with('sizes')->whereIn('id', $ids)->get();

            // Return the fetched products
            return $products;
        } else {
            // Handle case where 'ids' key is missing from request data
            return response()->json(['error' => 'IDs not provided'], 400);
        }
    }

    public function returnProduct($id)
    {
        $product = Product::with('sizes')->with('images')->findOrFail($id);
        return response()->json(['product' => $product]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return ['product' => $product];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        // Delete sizes
        $product->sizes()->delete();

        // Delete product images
        foreach ($product->images as $image) {
            File::delete(public_path($image->imgsrc));
            $image->delete();
        }

        // Delete the product
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
