<?php namespace App\Http\Controllers;

use App\Article;
use App\Book;
use ErrorException;
use Illuminate\Support\Facades\Request;
use League\Flysystem\Exception;

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
//		$this->middleware('auth', ['except' => ['index', 'getRandomNote']]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $bookId = Request::get('book_id');
//        dd($bookId);

        if(\Auth::user() == null) {
            $books = Book::where('id', '=', 0)->lists('name', 'id');
        } else {
            $books = Book::where('user_id', '=', \Auth::id())->orWhere('id', '=', 0)->lists('name', 'id');
        }

        if(array_key_exists($bookId, $books)) {
            $book = $books[$bookId];
            unset($books[$bookId]);

            $newBooks = [];
            $newBooks[$bookId] = $book;
            foreach($books as $key => $value) {
                $newBooks[$key] = $value;
            }

            $books = $newBooks;
        }

        return view('home', compact('books'));
	}

	public function getRandomNote()
	{
        if(\Request::get('book_id') == -1) {
            $books = Book::whereAccess(1)->get();

            foreach ($books as $book) {
                $articles_collection[] = HomeController::diffForHumans($book->articles()->get());
            }

            foreach ($articles_collection as $collection) {
                foreach ($collection as $article) {
                    $articles[] = $article;
                }

            }
        } else {
            $articles = HomeController::diffForHumans(Book::find(\Request::get('book_id'))->articles()->get());
        }

		if(\Request::ajax()) {
			return $articles;
		}

		$books = \Auth::user()->books()->lists('name', 'id');
		$article = $articles[rand(0, count($articles) - 1)];

		return view('home', compact('books', 'article'));

	}

    public function deleteArticle()
    {
        $article = Article::find(\Request::get('article_id'));
        if(\Auth::id() == $article['user_id']) {
            $article->delete();
            return 'true';
        } else {
            return 'Access denied!';
        }
    }

    public static function diffForHumans($entities)
    {
        if(count($entities) == 0) {
            return $entities;
        } elseif(count($entities) == 1) {
            $entities['created'] = $entities['created_at']->diffForHumans();
        } else {
            foreach ($entities as $entity) {
                $entity['created'] = $entity['created_at']->diffForHumans();
            }
        }

        return $entities;
    }
}
