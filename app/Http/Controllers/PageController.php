<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Like;
use App\Models\Category;

class PageController extends Controller
{
    public function index() {
        return view(
            'index',
            [
                'categories' => Category::all(),
                'ideas' => Idea::all(),
                'likes' => Like::all(),
            ]
        );
    }

    public function dashboard() {
        return view(
            'ideas',
            [
                'categories' => Category::all(),
                'ideas' => Idea::all(),
            ]
        );
    }

    public function list() {
        return view(
            'ideas-list',
            [
                'categories' => Category::all(),
                'ideas' => Idea::all(),
            ]
        );
    }

    public function create_category() {
        return view(
            'add-new-category',
            [
                'category_edit' => false,
            ]
        );
    }

    public function create_idea() {
        return view(
            'add-new-idea',
            [
                'idea_edit' => false,
            ]
        );
    }

    public function update_category($id) {
        return view(
            'add-new-category',
            [
                'category_edit' => true,
                'category' => Category::whereId($id)->first(),
            ]
        );
    }

    public function update_idea($id) {
        return view(
            'add-new-idea',
            [
                'idea_edit' => true,
                'idea' => Idea::whereId($id)->first(),
            ]
        );
    }
}
