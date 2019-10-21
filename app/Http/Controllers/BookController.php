<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\BookRequest;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();
        return view('pages.book-manager', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->only([
            'title',
            'author',
            'publisher',
            'publish_date',
            'language',
            'price',
        ]);

        //$data['user_id'] = Auth::id();

        $data['publish_date'] = Carbon::parse($request->publish_date)->format('Y-m-d');

        try {
            $book = Book::create($data);
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('createFailed', 'Create failed!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $data = $request->only([
            'title',
            'author',
            'publisher',
            'publish_date',
            'language',
            'price',
        ]);

        $book = Book::findOrFail($id);

        try {
            $book->update($data);
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('updateFailed', 'Update failed!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        try {
            $book->delete();
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->with('status', 'Delete failed.');
        }
        return back();
    }
}
