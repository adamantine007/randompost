@extends('app')

@section('content')

	{{--<div class="row fixed">--}}
		{{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
			{{--<a href="/articles/create" class="btn btn-default btn-block">--}}
				{{--<i class="fa fa-plus fa-2x fixedAddButtonHome"></i>--}}
			{{--</a>--}}
		{{--</div>--}}
	{{--</div>--}}



	{{--<div class="fixedEditButtonHome">--}}
		{{--<a href="/articles/">--}}
			{{--<i class="fa fa-pencil-square-o fa-3x editIconInLinkGroupButton"></i>--}}
		{{--</a>--}}
	{{--</div>--}}



	{{--{!! Form::open(['action' => 'HomeController@getRandomNote']) !!}--}}

		{{--<div class="row fixed fixedSelectHome">--}}
			{{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}

				{{--@if( ! empty($article))--}}
					{{--{!! Form::select('book_id', $books, $article->book_id, ['class' => 'form-control', 'id' => 'book']) !!}--}}
				{{--@else--}}
					{{--{!! Form::select('book_id', $books, null, ['class' => 'form-control', 'id' => 'book']) !!}--}}
				{{--@endif--}}

			{{--</div>--}}
		{{--</div>--}}

		{{--<div class="row fixed fixedDiceButtonHome">--}}
			{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">--}}

				{{--{!! Form::image('/img/Dice-100.png', null, ['id' => 'next-btn', 'style' => '']) !!}--}}

			{{--</div>--}}
		{{--</div>--}}


	{{--{!! Form::close() !!}--}}


	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="fixed">
				<a href="/articles/create" class="btn btn-default btn-block">
					<i class="fa fa-plus fa-2x fixedAddButtonHome"></i>
				</a>
			</div>

		</div>

		<div class="fixedEditButtonHome">
			<a href="/articles/">
				<i class="fa fa-pencil-square-o fa-3x editIconInLinkGroupButton"></i>
			</a>
		</div>

		{!! Form::open(['action' => 'HomeController@getRandomNote']) !!}

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="fixed fixedSelectHome">
					@if( ! empty($article))
						{!! Form::select('book_id', $books, $article->book_id, ['class' => 'form-control', 'id' => 'book']) !!}
					@else
						{!! Form::select('book_id', $books, null, ['class' => 'form-control', 'id' => 'book']) !!}
					@endif
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
				<div class="fixed fixedDiceButtonHome">
					{!! Form::image('/img/Dice-100.png', null, ['id' => 'next-btn', 'style' => '']) !!}
				</div>

			</div>
		{!! Form::close() !!}


		@if( ! empty($article))
			{{--<div class="row">--}}
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-col">
				<div class="article-bg">
					{!! $article->body !!}
				</div>
			</div>
			{{--</div>--}}
		@else
			{{--<div class="row" style="margin-top: 200px;">--}}
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-col">
				<div class="article-bg">
					<p>Select the book!</p>
				</div>
			</div>
			{{--</div>--}}
		@endif

	</div>





	{{--<div class="row" style="position: fixed; z-index: 3; background-color: #ffffff">--}}

		{{--<div class="row">--}}
			{{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
				{{--<a href="/articles/create" class="btn btn-default btn-block">--}}
					{{--<i class="fa fa-plus fa-2x"></i>--}}
				{{--</a>--}}
			{{--</div>--}}

			{{--{!! Form::open(['action' => 'HomeController@getRandomNote']) !!}--}}

			{{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}

				{{--@if( ! empty($article))--}}
					{{--{!! Form::select('book_id', $books, $article->book_id, ['class' => 'form-control', 'id' => 'book']) !!}--}}
				{{--@else--}}
					{{--{!! Form::select('book_id', $books, null, ['class' => 'form-control', 'id' => 'book']) !!}--}}
				{{--@endif--}}

			{{--</div>--}}

			{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">--}}

				{{--{!! Form::image('/img/Dice-100.png', null, ['id' => 'next-btn', 'class' => 'btn-block']) !!}--}}
				{{--{!! Form::image('/img/Dice-100.png', null, ['id' => 'next-btn']) !!}--}}
				{{--{!! Form::button('/img/Dice-100.png', ['type' => 'submit', 'class' => 'btn-block']) !!}--}}

			{{--</div>--}}

			{{--{!! Form::close() !!}--}}
		{{--</div>--}}


	{{--</div>--}}


	{{--@if( ! empty($article))--}}
		{{--<div class="row">--}}
			{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
				{{--<div class="article-bg">--}}
					{{--{!! $article->body !!}--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--@else--}}
		{{--<div class="row" style="margin-top: 200px;">--}}
			{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
				{{--<div class="article-bg">--}}
					{{--<p>Select the book!</p>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--@endif--}}

@endsection

@section('footer')

	<script>

		$(function () {

			$('#book').select2({
				theme: "classic"
			});

			$('a.btn')[0].href = $('a.btn')[0].href + '?book_id=' + $('#book').val();

//			console.log($('.fixedEditDeleteButtonsHome a')[0].href +  '/edit');

			loadArticles();

			function getArticles() {
				var $_token = "{{ csrf_token() }}";
				var book_id = $('#book').val();

				return $.ajax({
					type: 'POST',
					url: '{{ action('HomeController@getRandomNote') }}',
					data: {book_id: book_id, _token: $_token}
				});
			}

			function loadArticles() {
				getArticles().success(function (data) {

//					console.log(shuffle(data));


					articles = data;
					countOfArticles = articles.length;
					currentArticle = 0;


					showArticle(articles[currentArticle])
				});
			}

			function shuffle(o){
				for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
				return o;
			};

			function showArticle(article) {
//				console.log($('.fixedEditDeleteButtonHome a')[0].href + articles[currentArticle].id + '/edit');

				$('.fixedEditButtonHome a')[0].href = '/articles/' + articles[currentArticle].id + '/edit';

				currentArticle++;
				$('.article-bg').empty().append(article.body);
			}

			function showNextArticle() {
				if (currentArticle + 1 > countOfArticles) {
					currentArticle = 0;
				}

				showArticle(articles[currentArticle]);
			}

			$(document).on('click', '#next-btn', function (e) {
				e.preventDefault();
				showNextArticle();

			});

			$('#book').on('change', function() {
				loadArticles();
				$('a.btn')[0].href = $('a.btn')[0].href.split('?')[0] + '?book_id=' + $('#book').val();
			});
		});

	</script>

@endsection