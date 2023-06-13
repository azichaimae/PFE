<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(string $id)
    {
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
        $data = [
            'total' => $total,
            'products' => $products
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('commande_N' . $products[0]->commande_id . '.pdf');
    }
}
