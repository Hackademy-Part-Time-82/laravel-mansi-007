<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Mail\BookMail;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function index()
    {

        // $books = [
        //     ['name' => 'Divina Commedia'],
        //     ['name' => 'Promessi Sposi'],
        // ];
        $books = Book::all();
        return view('index', ['books' => $books]);
        //return view('index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('show', ['book' => $book]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(BookStoreRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('covers', 'public');
        }
        $book = Book::create([
            'name' => $request->input('name'),
            'pages' => $request->input('pages'),
            'year' => $request->input('year'),
            'image' => $path_image,
        ]);
        //Mail::to('admin@email.it')->send(new BookMail($book));
        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo');
    }
}
