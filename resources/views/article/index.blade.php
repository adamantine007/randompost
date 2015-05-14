@extends('app')

@section('content')

    @include('partials.index-header', ['actionName' => 'ArticleController@create', 'headTitle' => 'Notes'])

    @if(count($articles))

        @foreach($articles as $article)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{--<h3>--}}
                        {{--<a href="{{ action('ArticleController@show', ['id' => $article->id]) }}">--}}
                            {{ $article->body }}
                        {{--</a>--}}
                    {{--</h3>--}}
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>You have not any articles!</h1>
            </div>
        </div>
        
    @endif

@endsection