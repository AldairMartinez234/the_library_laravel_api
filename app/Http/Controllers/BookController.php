<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function index()
    {
        $books = DB::SELECT('SELECT *, if(status = 1,"Available","Not available") as availability from book;');
        return response()->json($books, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'status' => 'required',
        ]);

        $new_book = new Book();
        $new_book->name = $request->name;
        $new_book->author = $request->author;
        $new_book->category = $request->category;
        $new_book->published_date = $request->published_date;

        if($request->status=='Available')
        $statu = 1;
        else
        $statu = 0;

        $new_book->status =  $statu;
        $new_book->save(); // Se guarda el registro en la base de datos.

        return response()->json($new_book, 200);
    }



    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'status' => 'required',
        ]);

        $new_book = Book::findOrFail($request->id);
        $new_book->name = $request->get('name');
        $new_book->author = $request->get('author');
        $new_book->category = $request->get('category');
        $new_book->published_date = $request->get('published_date');

        if($request->get('status')=='Disponible')
        $statu = 1;
        else
        $statu = 0;

        $new_book->status =  $statu;
        $new_book->update(); // Se guarda el registro en la base de datos.

        return response()->json($new_book, 200);
    }


    public function destroy($id)
    {
        $book_delete = Book::findOrFail($id);
        $book_delete->delete();
        return response()->json($book_delete, 200);
    }
}
