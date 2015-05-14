@extends('app')

@section('content')

    @include('partials.index-header', ['actionName' => 'BookController@create', 'headTitle' => 'Books'])

    @if(count($books))

        @foreach($books as $book)
            <div class="row">
                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                    {{--<h3>--}}
                        {{--<a href="{{ action('BookController@show', ['id' => $book->id]) }}">--}}
                            {{--{{ $book->name }}--}}
                        {{--</a>--}}
                    {{--</h3>--}}
                {{--</div>--}}

                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h3>
                        <a href="{{ action('BookController@show', ['id' => $book->id]) }}">
                            {{ $book->name }}
                        </a>
                    </h3>
                </div>


                {{--<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">--}}
                    {{--<div class="btn-group btn-group-sm" role="group" aria-label="...">--}}
                            {{--<a class="btn btn-default" href="{{ action('BookController@edit', ['id' => $book->id]) }}">--}}
                                {{--<i class="fa fa-pencil-square-o fa-2x iconInRowInList"></i>--}}
                            {{--</a>--}}
                        {{--<button type="button" class="btn btn-default hide">--}}
                            {{--{!! Form::open(['method' => 'DELETE', 'action' => ['BookController@destroy', $book->id]]) !!}--}}

                            {{--<button type="submit" class="btn btn-default" onclick="return confirm('Are you sure?')">--}}
                                {{--<i class="fa fa-trash-o fa-2x"></i>--}}
                            {{--</button>--}}
                            {{--{!! Form::close() !!}--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-left: 0; padding-right: 0">
                    <div class="btn-group-vertical btn-block btn-group-xs" role="group" aria-label="...">

                        <a href="{{ action('BookController@edit', ['id' => $book->id]) }}" class="btn btn-default">
                            <i class="fa fa-pencil-square-o fa-2x editIconInLinkGroupButton"></i>
                        </a>

                        <button type="button" class="btn btn-default hide">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['BookController@destroy', $book->id]]) !!}

                                {!! Form::button('<i class="fa fa-trash-o fa-2x trashIconInColumn"></i>', ['type' => 'submit', 'class' => 'btn btn-default', 'onclick'=>'return confirm("Are you sure?")']) !!}

                            {!! Form::close() !!}
                        </button>
                    </div>
                </div>



                {{--<div class="col-xs-1 col-s m-1 col-md-1 col-lg-1">--}}
                    {{--<a href="{{ action('BookController@edit', ['id' => $book->id]) }}">--}}
                        {{--<i class="fa fa-pencil-square-o fa-2x iconInRowInList"></i>--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">--}}
                    {{--{!! Form::open(['method' => 'DELETE', 'action' => ['BookController@destroy', $book->id]]) !!}--}}

                        {{--{!! Form::button('<i class="fa fa-trash-o fa-2x trashIconInRowInList"></i>', ['type' => 'submit', 'style' => 'border: 0px; background: none;', 'onclick'=>'return confirm("Are you sure?")']) !!}--}}

                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}



                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <hr class="hr-list"/>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>You have not any books!</h1>
            </div>
        </div>

    @endif

@endsection
