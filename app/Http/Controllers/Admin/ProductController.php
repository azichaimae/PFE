<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Product;
use App\Models\Statu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
    $dd = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category')
        ->orderByDesc('id')
        ->get();

    return view('admin.product.index', ['dd' => $dd]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $data = Category::get();
        return view('admin.product.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|integer|min:1'
        ]);

        $product = new Product(); // Create a new instance of the Product model

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $publicPath = public_path('products');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $image->move($publicPath, $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->created_at = date('Y-m-d H:i:s');
        $product->save(); // Save the product to the database

        return redirect()->route('admin.products.index')->with('success', 'Product has been created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();

        $data = Product::select('*')->find($id);
        $cat = Category::get();
        return view("admin.product.edit", ['data' => $data, 'cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|integer|min:1'
        ]);


        $product = Product::findOrFail($id); // Retrieve the product or throw a 404 error if not found

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $publicPath = public_path('products');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $image->move($publicPath, $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save(); // Save the updated product to the database

        return redirect()->route("admin.products.index")->with('success', 'Product has been edited successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        if ($user->is_admin) {
            Product::where('id', $id)->delete();
            return redirect()->route('admin.products.index')->with('success', 'product has been deleted successfully.');
        } else {
            return redirect()->route("client.product.index");
        }
    }

    public function export()
    {
        $user = Auth::user();


        if ($user->is_admin) {
            return Excel::download(new ProductsExport, 'Products.xlsx');
        } else {
            return redirect()->route("client.product.index");
        }

    }
    public function import()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            Excel::import(new ProductsImport, request()->file('file'));
            return redirect()->route('admin.products.index')->with('success', 'Products have been uploaded successfully.');

        } else {
            return redirect()->route("client.product.index");
        }

    }
    public function commandes()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $cart = DB::table('commandes')
                ->join('status', 'commandes.status_id', '=', 'status.id')
                ->join('users', 'users.id', '=', 'commandes.user_id')
                ->select('commandes.*', 'status.name as status_name', 'users.name', 'users.email')
                ->orderByDesc('created_at')
                ->get();
            return view('admin.product.commandes', ["cart" => $cart]);
        } else {
            return redirect()->route("client.product.index");
        }
    }
    public function details(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $products = DB::table('products')
                ->select('products.*', 'product_commande.qte', 'status.name AS status_name', 'commandes.created_at AS cmddate', 'users.name AS user_name', 'users.email AS user_email', 'commandes.id AS commande_id')
                ->join('product_commande', 'product_commande.product_id', '=', 'products.id')
                ->join('commandes', 'commandes.id', '=', 'product_commande.commande_id')
                ->join('status', 'status.id', '=', 'commandes.status_id')
                ->join('users', 'users.id', '=', 'commandes.user_id')
                ->where('commandes.user_id', '=', 1)
                ->where('commandes.id', '=', $id)
                ->get();

            $total = 0;
            foreach ($products as $p) {
                $total += ($p->price * $p->qte);
            }

            $status = Statu::get();
            $cat = Category::get(); // Add this line to retrieve the categories

            return view('admin.product.details', ["cart" => $products, "total" => $total, "status" => $status, "cat" => $cat]);
        } else {
            return redirect()->route("client.product.index");
        }
    }

    public function changestatus(Request $request, string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $commande = Commande::find($id);
            $commande->status_id = $request->status;
            $commande->save();

            return redirect()->route('mail')->with('commande', $commande);
        } else {
            return redirect()->route("client.product.index");
        }

    }
}
