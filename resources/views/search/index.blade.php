@extends('app')

@section('content')

    <!-- Form to /search -->
    {!! Form::open(['url' => 'search']) !!}

    <!-- Query form field -->
    <div class="form-group">
        {!! Form::text('query', null, ['class' => 'form-control', 'placeholder' => 'Search...', 'id' => 'query-field']) !!}
    </div>

    <!-- Submit form button -->
    <div class="form-group">
        {!! Form::submit('Find', ['class' => 'btn', 'id' => 'subbtn']) !!}
    </div>

    {!! Form::close() !!}

    <div class="results">
        @if(! empty($results))
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        <a href="{{ action('ArticleController@show', ['id' => $result->id]) }}">
                            <div>{!! $result->body !!}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@stop

@section('footer')
    <script>
        $(function() {

            function getResults() {
                var $_token = "{{ csrf_token() }}";
                var query = $('#query-field').val();
                return $.ajax({
                    type: 'POST',
                    url: '/search',
                    data: {query: query, _token: $_token}
                });
            }

            $('#subbtn').on('click', function(e) {
                e.preventDefault();

                getResults().success(function (data) {
                    var answer = '<ul class="list-group">';

                    for(var i = 0; i < data.length; i++) {
                        answer += '<li class="list-group-item">' +
                        '<a href="/article/"' + data[i]['id'] + '>' +
                        '<h4>' + data[i]['body'] + '</h4>' +
                        '</a>' +
                        '</li>';
                    }
                    answer += '</ul>';

                    $('.results').empty().append(answer);
                });

            });
        });
    </script>
@stop