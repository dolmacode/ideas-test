<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Category;

class FormController extends Controller
{
    public function create_category(Request $request) {
        $credentials = $request->validate([
            'title' => 'required|max:150',
            'content' => 'required|max:500',
            'image',
        ]);

        $category = Category::create($credentials);

        $category->save();

        return redirect('/dashboard');
    }

    public function create_idea(Request $request) {
        $credentials = $request->validate([
            'title' => 'required|max:150',
            'author' => 'required|max:100',
            'content' => 'required|max:500',
            'status' => 'required|max:150',
            'category_id' => 'required',
        ]);

        $idea = Idea::create($credentials);

        $idea->save();

        return (!request()->headers->get('referer') == "/") ? redirect('/list') : redirect('/');
    }

    public function delete_category($id) {
        $item = Category::find($id);

        if (!empty($item)) {
            $item->delete();
        }

        return redirect('/dashboard');
    }

    public function delete_idea($id) {
        $item = Idea::find($id);

        if (!empty($item)) {
            $item->delete();
        }

        return redirect('/list');
    }

    public function update_category(Request $request, $id) {
        $credentials = $request->validate([
            'title' => 'required|max:150',
            'content' => 'required|max:500',
            'image',
        ]);

        Category::whereId($id)->update($credentials);

        return redirect('/dashboard');
    }

    public function update_idea(Request $request, $id) {
        $credentials = $request->validate([
            'title' => 'required|max:150',
            'author' => 'required|max:100',
            'content' => 'required|max:500',
            'status' => 'required|max:150',
            'category_id' => 'required',
        ]);

        Idea::whereId($id)->update($credentials);

        return redirect('/list');
    }
}
