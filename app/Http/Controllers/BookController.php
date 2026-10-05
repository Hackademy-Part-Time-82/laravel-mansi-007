<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Mail\BookMail;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        $authors = Author::all();
        $categories = Category::all();
        return view('create', ['authors' => $authors, 'categories' => $categories]);
    }

    public function store(BookStoreRequest $request)
    {

        $path_image = '';
        if ($request->hasFile('image')) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('covers', $path_name, 'public');
        }
        $book = Book::create([
            'name' => $request->input('name'),
            'pages' => $request->input('pages'),
            'year' => $request->input('year'),
            'image' => $path_image,
            'user_id' => auth()->user()->id,
            'author_id' => $request->input('author_id'),
            //'user_id' => Auth::user()->id
        ]);
        $book->categories()->attach($request->input('categories'));

        //Mail::to('admin@email.it')->send(new BookMail($book));
        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo');
    }


    public function edit(Book $book)
    {
        //$this->middleware('owner');
        //se il libro è dell'utente mi mostri la pagina di modifica
        //ALtrimenti se non è dell'utente, mostra pagibna non autorizzata 
        if (auth()->user()->id == $book->user_id) {
            $authors = Author::all();
            $categories = Category::all();
            return view('edit', ['book' => $book, 'authors' => $authors, 'categories' => $categories]);
        }
        abort(401);
    }

    public function update(BookStoreRequest $request, Book $book)
    {
        if (auth()->user()->id == $book->user_id) {
            $path_image = $book->image;
            if ($request->hasFile('image')) {
                $path_name = $request->file('image')->getClientOriginalName();
                $path_image = $request->file('image')->storeAs('covers', $path_name, 'public');
            }
            $book->update([
                'name' => $request->input('name'),
                'pages' => $request->input('pages'),
                'year' => $request->input('year'),
                'image' => $path_image,
                'user_id' => auth()->user()->id,
                'author_id' => $request->input('author_id'),
                //'user_id' => Auth::user()->id
            ]);
            // $book->categories()->detach();
            // $book->categories()->attach($request->input('categories'));
            $book->categories()->sync($request->input('categories'));
            //Mail::to('admin@email.it')->send(new BookMail($book));
            return redirect()->route('books.index')->with('success', 'Libro aggiornato con successo');
        }
        abort(401);
    }

    public function destroy(Book $book)
    {
        if (auth()->user()->id == $book->user_id) {
            $book->categories()->detach();
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Libro eliminato con successo');
        }
        abort(401);
    }
}
