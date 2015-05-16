@extends('app')

@section('content')

    @include('partials.index-header', ['actionName' => 'BookController@create', 'headTitle' => 'Books'])

    @if(count($books))

        @foreach($books as $book)
            <div class="row">

                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h3 class="h3-list">
                        <a href="{{ action('BookController@show', ['id' => $book->id]) }}">
                            {{ $book->name }}
                        </a>
                    </h3>
                </div>


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

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    {!! Form::checkbox('access', 1, $book->access, ['data-on-text' => 'Public', 'data-off-text' => 'Private', 'id' => 'access-'.$book->id]) !!}
                </div>

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

@section('footer')
    <script>
        $(function () {
            $("input[name='access']").bootstrapSwitch();

            $('input[name="access"]').on('switchChange.bootstrapSwitch', function(event, state) {

                if(state) {
                    var access = 1;
                } else {
                    var access = 0;
                }

                var id = $(this).attr('id').split('-')[1];
                var url = '/books/' + id + '/access-change';
                var $_token = "{{ csrf_token() }}";

                var data = {
                    id: id,
                    access: access,
                    _token: $_token
                };

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data
                });
            });
        });
    </script>
@endsection
