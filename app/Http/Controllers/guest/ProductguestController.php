<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductguestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();

            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                ->orderByDesc('id')
                ->get();
            return view('guest.index', ["dd" => $dd, "cat" => $cat]);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.product.index');
            }
        }

    }

    public function show(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            $data = Product::select('*')->find($id);
            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('guest.show', ['data' => $data, 'cat' => $cat]);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
                // return "client";
            }
        }
    }

    public function cart(string $id)
    {
        $user = Auth::user();
        if (!$user) {
            $idProduct = $id;
            $cookieData = request()->cookie('cart');

            if ($cookieData) {
                $idsArray = json_decode($cookieData, true);
                $idsArray[] = $idProduct;
            } else {
                $idsArray = [$idProduct];
            }

            $cookieValue = json_encode($idsArray);
            $cookie = cookie('cart', $cookieValue, 60000);
            return redirect()->back()->withCookie($cookie);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
            }
        }
    }
    public function category(string $id)
    {
        $user = Auth::user();
        if (!$user) {
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
            return view('guest.category', ['dd' => $dd, 'cat' => $cat]);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
                // return "client";
            }
        }
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
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

            return view('guest.search', ["dd" => $dd, "cat" => $cat, "search" => $request->search]);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
            }
        }
    }
    public function filter(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            $dd = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category')
                ->whereBetween('products.price', [$request["min-price"], $request["max-price"]])
                ->orderByDesc('id')
                ->get();

            $cat = DB::table('categories as c')
                ->leftJoin('products as p', 'c.id', '=', 'p.category_id')
                ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as count'))
                ->groupBy('c.id', 'c.name')
                ->orderByDesc('count')
                ->get();
            return view('guest.filter', ["dd" => $dd, "cat" => $cat, "min" => $request["min-price"], "max" => $request["max-price"]]);

        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
            }
        }
    }
    public function shopping()
    {
        $user = Auth::user();
        if (!$user) {
            $myArray = json_decode(request()->cookie('cart'), true);
            $products = Product::whereIn('id', $myArray)->get();
            $counts = array_count_values($myArray);
            for ($i = 0; $i < count($products); $i++) {
                foreach ($counts as $k => $v) {
                    if ($products[$i]->id == $k) {
                        $products[$i]->count = $v;
                    }
                }
            }
            return view('guest.shopping', ["cart" => $products]);
        } else {
            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            } else {
                return redirect()->route('client.Product.index');
            }
        }
    }


}
