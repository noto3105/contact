<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $categories = Contact::all();
        return view('admin', compact('contacts'));
    }

    public function search(Request $request)
    {
        $categories = Category::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('admin', 'categories'));
    }
}
