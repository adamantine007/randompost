@extends('app')

@section('content')

    {{--<div class="row">--}}
        {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}

            {{--<h2 class="h2-head">--}}
                {{--{{ $book->name }}--}}
            {{--</h2>--}}

        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
            <h2 class="h2-head">{{ $book->name }}</h2>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 iconInRowInHeader" style="padding-left: 7px;; padding-right: 0">
            <a href="/articles/create?book_id={{ $book->id }}"><i class="fa fa-plus-square-o fa-3x"></i></a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <hr class="hr-list"/>
            </div>
        </div>
    </div>

    @if(count($book->articles))

        @foreach($book->articles as $article)
            <div class="row">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <div class="article-bg">
                        {{ $article->description }}  <a href="{{ action('ArticleController@show', ['id' => $article->id]) }}" class="read-more">read more</a>
                    </div>
                </div>

                @if($article->user_id == Auth::id())
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
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 datetime">
                    {{ $article->created_at->format('d-m-Y H:i') }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <hr class="hr-list"/>
                </div>
            </div>

        @endforeach

    @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>This book don't have any notes yet!</h3>
            </div>
        </div>
    @endif


@endsection