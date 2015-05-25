@extends('app')

@section('content')

    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
            <h2 class="h2-head">
                <a href="{{ action('BookController@index') }}">Books</a> /
                {{ $book->name }}
            </h2>
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

        <div class="row">
            <section class="ac-container">
                @for($i = 0; $i < count($book->articles); $i++)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input id="ac-{{$i}}" name="accordion-1" type="checkbox" />
                        <label for="ac-{{$i}}">{{ $book->articles[$i]->short }}</label>
                        <article class="ac-small">
                            <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11">
                                {{ $book->articles[$i]->description }} <a href="{{ action('ArticleController@show', ['id' => $book->articles[$i]->id]) }}" class="read-more">read more</a>
                            </div>
                            @if($book->articles[$i]->user_id == Auth::id())
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1" style="padding-left: 0; padding-right: 1px; padding-top: 1px;">
                                    <div class="btn-group-vertical btn-block btn-group-xs" role="group" aria-label="...">

                                        <a href="{{ action('ArticleController@edit', ['id' => $book->articles[$i]->id]) }}" class="btn btn-default">
                                            <i class="fa fa-pencil-square-o fa-2x editIconInLinkGroupButton"></i>
                                        </a>

                                        <button type="button" class="btn btn-default hide">
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['ArticleController@destroy', $book->articles[$i]->id]]) !!}

                                            {!! Form::button('<i class="fa fa-trash-o fa-2x trashIconInColumn"></i>', ['type' => 'submit', 'class' => 'btn btn-default', 'onclick'=>'return confirm("Are you sure?")']) !!}

                                            {!! Form::close() !!}
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 datetime">
                                {{ $book->articles[$i]->created_at->format('d-m-Y H:i') }}
                            </div>
                        </article>

                    </div>
                @endfor
            </section>
        </div>

        {{--<section class="ac-container">--}}
            {{--<div>--}}
                {{--<input id="ac-1" name="accordion-1" type="checkbox" />--}}
                {{--<label for="ac-1">About us</label>--}}
                {{--<article class="ac-small">--}}
                    {{--<p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>--}}
                {{--</article>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<input id="ac-2" name="accordion-1" type="checkbox" />--}}
                {{--<label for="ac-2">How we work</label>--}}
                {{--<article class="ac-medium">--}}
                    {{--<p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>--}}
                {{--</article>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<input id="ac-3" name="accordion-1" type="checkbox" />--}}
                {{--<label for="ac-3">References</label>--}}
                {{--<article class="ac-large">--}}
                    {{--<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>--}}
                {{--</article>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<input id="ac-4" name="accordion-1" type="checkbox" />--}}
                {{--<label for="ac-4">Contact us</label>--}}
                {{--<article class="ac-large">--}}
                    {{--<p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic. </p>--}}
                {{--</article>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<input id="ac-5" name="accordion-1" type="checkbox" />--}}
                {{--<label for="ac-5">Contact us+++</label>--}}
                {{--<article class="ac-large">--}}
                    {{--<p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic. </p>--}}
                {{--</article>--}}
            {{--</div>--}}
        {{--</section>--}}

    @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>This book don't have any notes yet!</h3>
            </div>
        </div>
    @endif

@endsection