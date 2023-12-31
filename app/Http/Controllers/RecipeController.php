<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recipes;
use App\Models\likes;
use App\Models\Comment;

class RecipeController extends Controller
{
    // Admin Recepies---------------------------------------------------------------
    public function AdminIndex()
    {
        $recipes = recipes::all();
        return view('Admin.recipes.index', compact('recipes'));
    }
    public function AdminCreate()
    {
        return view('admin.Recipes.create');
    }
    public function AdminStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
        ]);


        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = time().'.'.$picture->getClientOriginalExtension();
            $publicPath = public_path('recipes');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $picture->move($publicPath, $pictureName);

        }
        $recipe = new recipes();
        $recipe->name = $request->input('name');
        $recipe->picture = $pictureName;
        $recipe->description = $request->input('description');
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        return redirect('/admin/recipe')->with('success', 'Recipe created successfully.');
    }
    public function AdminEdit(string $id)
    {
        $recipe = recipes::findOrFail($id);
        return view('admin.Recipes.edit', compact('recipe'));
    }
    public function AdminUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $recipe = recipes::findOrFail($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');

        if ($request->hasFile('picture')) {

            $picture = $request->file('picture');
            $imageName = time().'.'.$picture->getClientOriginalExtension();
            $publicPath = public_path('recipes');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $picture->move($publicPath, $imageName);
            $oldPicture = $request->input('old_picture');
            if ($oldPicture) {
                $oldImagePath = public_path('recipes/'.$oldPicture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $recipe->picture = $imageName;
        } else {
            $recipe->picture = $request->input('old_picture');
        }

        $recipe->save();

        return redirect('/admin/recipe')->with('success', 'Recipe updated successfully.');

    }
    // End Admin --------------------------------------------------------------------------------------------

    // Client recepies ----------------------------------------------------------------------------------------------
    public function index()
    {
        $recipes = recipes::all();
        return view('recipes.index', compact('recipes'));
    }
    public function create()
    {
        return view('recipes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
        ]);


        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = time().'.'.$picture->getClientOriginalExtension();
            $publicPath = public_path('recipes');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $picture->move($publicPath, $pictureName);

        }
        $recipe = new recipes();
        $recipe->name = $request->input('name');
        $recipe->picture = $pictureName;
        $recipe->description = $request->input('description');
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        return redirect('/recipe')->with('success', 'Recipe created successfully.');
    }
    public function show(string $id)
    {
        $recipe = recipes::findOrFail($id);
        return back()->with('success', 'Recipe deleted successfully.');
    }
    public function edit(string $id)
    {
        $recipe = recipes::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $recipe = recipes::findOrFail($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');

        if ($request->hasFile('picture')) {

            $picture = $request->file('picture');
            $imageName = time().'.'.$picture->getClientOriginalExtension();
            $publicPath = public_path('recipes');

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

            $picture->move($publicPath, $imageName);
            $oldPicture = $request->input('old_picture');
            if ($oldPicture) {
                $oldImagePath = public_path('recipes/'.$oldPicture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $recipe->picture = $imageName;
        } else {
            $recipe->picture = $request->input('old_picture');
        }

        $recipe->save();

        return redirect('/client/recipes')->with('success', 'Recipe updated successfully.');

    }
    public function destroy(string $id)
    {
        $recipe = recipes::findOrFail($id);
        $recipe->delete();

        return back()->with('success', 'Recipe deleted successfully.');

    }
    public function toggleLike($recipeId)
    {

        $user = auth()->user();
        $like = likes::where('user_id', $user->id)
                    ->where('recipes_id', $recipeId)
                    ->first();
        if ($like) {
            $like->status = !$like->status;
            $like->save();
        } else {

            $like = new likes([
                'user_id' => $user->id,
                'recipes_id' => $recipeId,
                'status' => true,
            ]);
            $like->save();
        }
        return redirect()->back();
    }
    public function AddComment(Request $request)
    {

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->recipes_id = $request->input('recipe_id');
        $comment->text_comment = $request->input('comment');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    // End client ---------------------------------------------------------------------------------------------------
}
