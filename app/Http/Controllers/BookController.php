<?php namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = \Auth::user()->books()->latest()->get();

		return view('book.index', compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$books = Book::bookNamesForAutonaming()->get();

		$numbers = [];
		foreach ($books as $book) {
			$tmp = (int)substr($book->name, 4);

			if($tmp != 0) {
				$numbers[] = $tmp;
			}
		}

		sort($numbers);

		$book_name = 'Book ' . (last($numbers) + 1);

		return view('book.create', compact('book_name'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param BookRequest $request
	 * @return Response
	 */
	public function store(BookRequest $request)
	{
		$book = \Auth::user()->books()->save(new Book($request->all()));

		return redirect('/articles/create?book_id=' . $book['id']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Book $book
	 * @return Response
	 * @internal param int $id
	 */
	public function show(Book $book)
	{
		$book->articles = $this->addDescription($book->articles()->get());
//		return view('book.show', compact('book'));

		return view('book.new-show', compact('book'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Book $book
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Book $book)
	{
		return view('book.edit', compact('book'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param BookRequest $request
	 * @param Book $book
	 * @return Response
	 * @internal param int $id
	 */
	public function update(BookRequest $request, Book $book)
	{
		$book->update([
            'name' => $request->get('name'),
            'access' => $request->get('access'),
        ]);

		return redirect('books');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Book $book
	 * @return Response
	 * @internal param int $id
	 */
	public function destroy(Book $book)
	{
		$book->delete();

		return redirect('books');
	}

	public function addDescription($articles)
	{
		if(count($articles) == 0) return [];

        $short = 30;
        $description = 200;

		foreach($articles as $article)
		{
            if(mb_strlen($article['body']) > $short) {
                $article['short'] = mb_substr(strip_tags($article['body']), 0, $short) . '...';
            } else {
                $article['short'] = strip_tags($article['body']);
            }

            if(mb_strlen($article['body']) > $description) {
                $article['description'] = mb_substr(strip_tags($article['body']), 0, $description) . '...';
            } else {
                $article['description'] = strip_tags($article['body']);
            }
		}

		return $articles;
	}

    public function changeAccess(Book $book){

        if(\Request::ajax()) {
            $book->update([
                'access' => \Request::get('access'),
            ]);

            return ';)';
        }

        return view('errors.503');
    }

}
