<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->tel1 . ' ' . $request->tel2 . ' ' . $request->tel3;

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category', 'detail']);

        $contact['tel'] = $tel;

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request) 
    {   
        $tel = $request->tel1 . ' ' . $request->tel2 . ' ' . $request->tel3;

        $category = Category::where('content', $request->category)->first();

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category', 'detail']);
        
        $contact['tel'] = $tel;

        $contact['category_id'] = $category->id;

        Contact::create($contact);
        return view('thanks');
    }  
}
