<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Commande;
use App\Models\Product;
use App\Models\ProductCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                ->orderByDesc('id')
                ->get();
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('client.index', ["dd" => $dd, "cat" => $cat]);
        }

    }

    public function show(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $data = product::select('*')->find($id);
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('client.show', ['data' => $data, "cat" => $cat]);
        }
    }

    public function category(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                ->where('category_id', $id)
                ->orderByDesc('id')
                ->get();
            // $cat = Category::get();
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            // return dd($dd);
            return view('client.category', ['dd' => $dd, 'cat' => $cat]);
        }
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                ->where('products.name', 'like', '%' . $request->search . '%')
                ->orderByDesc('id')
                ->get();

            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();

            return view('client.search', ["dd" => $dd, "cat" => $cat, "search" => $request->search]);
        }
    }
    public function filter(Request $request)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                // ->where('products.name', 'like', '%' . $request->search . '%')
                ->whereBetween('products.price', [$request["min-price"], $request["max-price"]])
                ->orderByDesc('id')
                ->get();

            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            // return $request;
            return view('client.filter', ["dd" => $dd, "cat" => $cat, "min" => $request["min-price"], "max" => $request["max-price"]]);
        }
    }
    public function cart(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $userId = Auth::id();
            $productId = $id;

            $cart = Cart::where('user_id', $userId)->first();

            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->save();
                $cart = Cart::where('user_id', $userId)->first();
            }

            $record = DB::table('product_cart')
                ->where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if (!$record) {
                DB::table('product_cart')->insert([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'qte' => 1,
                ]);

            } else {
                DB::table('product_cart')
                    ->where('cart_id', $cart->id)
                    ->where('product_id', $productId)
                    ->update(['qte' => $record->qte += 1]);
            }

            // return $userId = Auth::id();
            return redirect()->back();
        }

    }
    public function shopping()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            // $products= [];
            $userId = Auth::id();

            $products = DB::table('products')
                ->select('products.*', 'product_cart.qte')
                ->join('product_cart', 'product_cart.product_id', '=', 'products.id')
                ->join('carts', 'carts.id', '=', 'product_cart.cart_id')
                ->where('carts.user_id', '=', $userId)
                ->get();

            $total = 0;
            foreach ($products as $p) {
                $total += ($p->price * $p->qte);
            }
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            // return 'shopping client';
            return view('client.shopping', ["cart" => $products, "total" => $total, "cat" => $cat]);
        }
    }
    public function confirm()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $userId = Auth::id();

            $products = DB::table('product_cart')
                ->select('product_id', 'qte')
                ->join('carts', 'carts.id', '=', 'product_cart.cart_id')
                ->where('carts.user_id', '=', $userId)
                ->get()
                ->toArray();

            if ($products) {
                $commande = new Commande();
                $commande->user_id = $userId;
                $commande->status_id = 1;
                $commande->save();

                foreach ($products as $product) {
                    $productCommand = new productCommande();
                    $productCommand->commande_id = $commande->id;
                    $productCommand->product_id = $product->product_id;
                    $productCommand->qte = $product->qte;
                    $productCommand->save();
                }

                DB::table('carts')->where('user_id', $userId)->delete();

                return redirect()->route('client.product.index')->with('success', 'commande has been ordered.');
            }
            return redirect()->route('client.product.index')->with('error', 'no products in commande.');

        }
    }
    public function history()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route("admin.products.index");
        } else {
            $user = Auth::user();
            $cart = DB::table('commandes')
                ->join('status', 'commandes.status_id', '=', 'status.id')
                ->where('commandes.user_id', $user->id)
                ->select('commandes.*', 'status.name as status_name')
                ->orderByDesc('created_at')
                ->get();

            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('client.history', ["cart" => $cart, "cat" => $cat]);
            // return dd($cart);
        }
    }
    public function details(string $id)
    {
        $user = Auth::user();{
            if ($user->is_admin) {
                return redirect()->route("admin.products.index");
            } else {
                $userId = Auth::user()->id;

                $products = DB::table('products')
                    ->select('products.*', 'product_commande.qte', 'status.name AS status_name', 'commandes.created_at AS cmddate')
                    ->join('product_commande', 'product_commande.product_id', '=', 'products.id')
                    ->join('commandes', 'commandes.id', '=', 'product_commande.commande_id')
                    ->join('status', 'status.id', '=', 'commandes.status_id')
                    ->where('commandes.user_id', '=', $userId)
                    ->where('commandes.id', '=', $id)
                    ->get();

                $cat = DB::table('categories as c')
                    ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                    ->groupBy('c.id', 'c.name')
                    ->orderByDesc('count')
                    ->get();

                $total = 0;
                foreach ($products as $p) {
                    $total += ($p->price * $p->qte);
                }
                return view('client.details', ['cart' => $products, "cat" => $cat, "total" => $total]);
                // return $products;
                // return view('client.history', ["cart" => $products, "cat" => $cat]);
            }
        }
    }
}
