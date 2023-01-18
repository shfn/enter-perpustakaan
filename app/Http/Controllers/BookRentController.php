<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(7)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Tidak bisa meminjam, buku tidak tersedia!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {

            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 5) {
                Session::flash('message', 'Tidak bisa meminjam, telah melebihi batas peminjaman!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    // proses memasukan rent logs tabel
                    RentLogs::create($request->all());
                    // proses update tabel
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'no stock';
                    $book->save();
                    DB::commit();
                    Session::flash('message', 'Berhasil meminjam!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        //user & buku yg dipilih untuk di kembalikan benar, maka berhasil mengembalikan buku
        //user & buku yg dipilih untuk di kembalikan salah, maka muncul error message

        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            //kembalikan buku
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
            Session::flash('message', 'Buku telah dikambalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            //eror message
            Session::flash('message', 'User tidak meminjam buku ini!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
