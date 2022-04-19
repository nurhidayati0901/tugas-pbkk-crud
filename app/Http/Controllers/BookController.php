<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Detail;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

class BookController extends Controller
{
    // show books
    public function index() {
        return view('show-book', [
            'books' => Book::all()
        ]);
    }

    // show input-form
    public function showInputForm() {
        return view('input-book');
    }

    // store data
    public function create(Request $request) {
        // ddd($request);
        // return $request->file('image')->store('book-images');
        $validateData = $request->validate([
            'image' => 'required | image | mimes:jpeg,png,jpg | max:2048',
            'judul' => 'required | min:5 | max:255',
            'penulis' => 'required | min:5 | max:255',
            'penerbit' => 'required | min:5 | max:255',
            'tahun_terbit' => 'required',
            'isbn' => 'required | min:13',
            'harga' => 'required'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('book-images');
        }
        // dd($request);
        Book::create($validateData);

        $validateDetail = $request->validate([
            'book_detail' => 'required'
        ]);

        $book = Book::where('judul', $validateData['judul']);
        // dd($book->first()->id);
        $detail_book = new Detail;
        $detail_book->book_id = $book->first()->id;
        $detail_book->book_detail = $validateDetail['book_detail'];
        $detail_book->save();

        return redirect('/')->with('status', 'Data buku berhasil ditambah!');
    }

    // show edit form
    public function edit($id) {
        $book = Book::find($id);
        return view('edit-book', [
            'book' => $book
        ]);
    }

    // update data
    public function update(Request $request, $id) {
        $book = Book::find($id);
        $validateData = $request->validate([
            'image' => 'required | image | mimes:jpeg,png,jpg | max:2048',
            'judul' => 'required | min:5 | max:255',
            'penulis' => 'required | min:5 | max:255',
            'penerbit' => 'required | min:5 | max:255',
            'tahun_terbit' => 'required',
            'isbn' => 'required | min:13',
            'harga' => 'required'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('book-images');
        }
        // dd($request);
        $book->update($validateData);
        return redirect('/')->with('status', 'Data buku berhasil diupdate!');
    }

    // show detail book by id
    public function detail($id) {
        $book = Book::find($id);
        return view('detail-book', [
            'book' => $book
        ]);
    }

    // delete data
    public function destroy($id) {
        $book = Book::find($id);
        $book->delete();
        return redirect('/')->with('status', 'Data buku berhasil dihapus!');
    }
}
