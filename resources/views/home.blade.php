@extends('app')

@section('content')

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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-col">
				<div class="article-bg">
					{!! $article->body !!}
				</div>
			</div>
		@else
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-col">
				<div class="article-bg">
					<p>Select the book!</p>
				</div>
			</div>
		@endif

	</div>

@endsection

@section('footer')
	<script>
		$(function () {

			$('#book').select2({
				theme: "classic"
			});

			$('a.btn')[0].href = $('a.btn')[0].href + '?book_id=' + $('#book').val();

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