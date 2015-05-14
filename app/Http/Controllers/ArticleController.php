<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;



class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return redirect('articles/create');

		$articles = Article::latest()->get();

//		dd($articles);

		return view('article.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$books = \Auth::user()->books()->lists('name', 'id');

		$book_id = null;
		if(\Request::get('book_id')) {
			$book_id = \Request::get('book_id');
		}

		return view('article.create', compact('books', 'book_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ArticleRequest $request
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$article = new Article($request->all());
		$article['book_id'] = $request->get('book_id');

		\Auth::user()->articles()->save($article);


		$books = \Auth::user()->books()->lists('name', 'id');

//		return view('home', compact('article', 'books'));
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Article $article
	 * @return Response
	 * @internal param int $id
	 */
	public function show(Article $article)
	{
		return view('article.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Article $article
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Article $article)
	{
		$books = \Auth::user()->books()->lists('name', 'id');

		$book_id = $article->book_id;

		return view('article.edit', compact('article', 'books', 'book_id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ArticleRequest $request
	 * @param Article $article
	 * @return Response
	 * @internal param int $id
	 */
	public function update(ArticleRequest $request, Article $article)
	{
//		dd($request->get('body'));



		$article['book_id'] = $request->get('book_id');
		$article->update($request->all());

//		return redirect('articles');
		return redirect('books/' . $request->get('book_id'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Article $article
	 * @return Response
	 * @throws \Exception
	 * @internal param int $id
	 */
	public function destroy(Article $article)
	{
//		dd($article);

		$article->delete();

		return back();
	}

}
