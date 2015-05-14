@extends('app')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<p class="datetime">{{ $article->created_at }}</p>
        </div>


        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <div class="article-bg">
                {!! $article->body !!}
            </div>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-left: 0; padding-right: 0">
            <div class="btn-group-vertical btn-block btn-group-xs" role="group" aria-label="...">

                <a href="{{ action('ArticleController@edit', ['id' => $article->id]) }}" class="btn btn-default">
                    <i class="fa fa-pencil-square-o fa-2x editIconInLinkGroupButton"></i>
                </a>

                <button type="button" class="btn btn-default hide">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['ArticleController@destroy', $article->id]]) !!}

                    {!! Form::button('<i class="fa fa-trash-o fa-2x trashIconInColumn"></i>', ['type' => 'submit', 'class' => 'btn btn-default', 'onclick'=>'return confirm("Are you sure?")']) !!}

                    {!! Form::close() !!}
                </button>
            </div>
        </div>

    </div>

@endsection