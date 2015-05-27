{!! Form::open(['method' => 'DELETE', 'action' => ['ArticleController@destroy', $article->id]]) !!}

    {!! Form::button('<i class="fa fa-trash-o fa-2x trashIconInColumn"></i>', ['type' => 'submit', 'class' => 'btn btn-default', 'onclick'=>'return confirm("Are you sure?")']) !!}

{!! Form::close() !!}