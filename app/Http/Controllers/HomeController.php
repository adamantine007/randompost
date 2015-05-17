<?php namespace App\Http\Controllers;

use App\Book;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    /**
     * Create a new controller instance.
     *
     */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = \Auth::user()->books()->lists('name', 'id');

        return view('home', compact('books'));
	}

	public function getRandomNote()
	{
        if(\Request::get('book_id') == 0) {
            $books = \Auth::user()->books()->whereAccess(1)->get();

            foreach ($books as $book) {
                $articles_collection[] = $book->articles()->get();
            }

            foreach ($articles_collection as $collection) {
                foreach ($collection as $article) {
                    $articles[] = $article;
                }

            }
        } else {
            $articles = Book::find(\Request::get('book_id'))->articles()->get();
        }

		if(\Request::ajax()) {
			return $articles;
		}

		$books = \Auth::user()->books()->lists('name', 'id');
		$article = $articles[rand(0, count($articles) - 1)];

		return view('home', compact('books', 'article'));

	}
}
