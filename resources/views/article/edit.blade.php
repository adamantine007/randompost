@extends('app')

@section('content')

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]) !!}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                {!! Form::button('<i class="fa fa-floppy-o fa-4x"></i>', ['type' => 'submit', 'class' => 'iconPlusAsButton btn-block']) !!}
            </div>
        </div>

        @include('article.partials.form')

    {!! Form::close() !!}

@endsection

@section('footer')

    <script>
        $(function () {
            $('#book').select2({
                theme: "classic"
            });
        });
    </script>

@endsection