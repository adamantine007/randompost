@extends('app')

@section('content')

	<div class="row" style="margin-top: -5px;">

		<div class="bg-white fixed" style="padding-top: 5px;">
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

            {{--<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">--}}
                {{--<div class="fixed fixedSelectHome">--}}
                    {{--{!! Form::checkbox('access', 1, 0, ['data-on-text' => 'Public', 'data-off-text' => 'Private']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

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
                    {{--{!! Form::image('/img/Dice-100.png', null, ['id' => 'next-btn', 'style' => '']) !!}--}}
                    {!! Form::button('<i class="fa fa-random"></i>', ['type' => 'button', 'id' => 'next-btn', 'class' => 'btn-block']) !!}
                </div>

            </div>
            {!! Form::close() !!}
        </div>


		@if( ! empty($article))
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 datetime-col">
                {{ $article->created_at }}
            </div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 article-col">
				<div class="article-bg">
					{!! $article->body !!}
				</div>
			</div>
		@else
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 datetime-col">

            </div>
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

//            $("[name='access']").bootstrapSwitch();

//            if($("[name='access']").prop("checked")) {
//                $('#book').prop( "disabled", true)
//            }

			$('#book').select2({
				theme: "classic"
			});

			$('a.btn')[0].href = $('a.btn')[0].href + '?book_id=' + $('#book').val();

			loadArticles();

			function getArticles(id) {
				var $_token = "{{ csrf_token() }}";
                var book_id;

                if (id !== undefined) {
                    book_id = id;
                } else {
                    book_id = $('#book').val();
                }

				return $.ajax({
					type: 'POST',
					url: '{{ action('HomeController@getRandomNote') }}',
					data: {book_id: book_id, _token: $_token}
				});
			}

			function loadArticles(id) {
				getArticles(id).success(function (data) {
					articles = shuffle(data);
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
                if(article == undefined) {
                    $('.article-bg').empty();
                    $('.datetime-col').empty();
                } else {
                    $('.fixedEditButtonHome a')[0].href = '/articles/' + articles[currentArticle].id + '/edit';

                    currentArticle++;

                    $('.article-bg').empty().append(article.body);
                    $('.datetime-col').empty().append(article.created_at);
                }
			}


			function showNextArticle() {
				if (currentArticle + 1 > countOfArticles) {
					currentArticle = 0;
                    articles = shuffle(articles);
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

//            $('input[name="access"]').on('switchChange.bootstrapSwitch', function(event, state) {
//                console.log(state); // true | false
//
//                if( state) {
//                    loadArticles(-1);
//                    $('#book').prop( "disabled", state);
//                } else {
//                    loadArticles();
//                    $('#book').prop( "disabled", state);
//                }
//            });
		});
	</script>
@endsection