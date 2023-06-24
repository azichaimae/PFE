<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $data = DB::table('users')->where('id', '!=', auth()->user()->id)->get();
            return view('admin.user.index', ['data' => $data]);
        } else {
            return redirect()->route("client.product.index");
        }
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            $data = User::select('*')->find($id);
            return view("admin.user.edit", ['data' => $data]);
        } else {
            return redirect()->route("client.product.index");
        }

    }
    public function destroy(string $id)
    {
        $user= User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user = Auth::user();
    if ($user->is_admin) {
        $request->validate([
            'is_admin' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => ($request->is_admin == "true" ? 1 : 0),
        ];

        User::where('id', $id)->update($userData);

        return redirect()->route("admin.users.index")->with('success', 'User has been updated successfully.');
    } else {
        return redirect()->route("client.product.index");
    }
}


}
