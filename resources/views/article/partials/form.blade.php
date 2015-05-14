<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
            {!! Form::textarea('body', null, ['class' => 'form-control ckeditor', 'id' => 'editor1']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if( ! is_null($book_id))
            {!! Form::select('book_id', $books, $book_id, ['class' => 'form-control', 'id' => 'book']) !!}
        @else
            {!! Form::select('book_id', $books, null, ['class' => 'form-control', 'id' => 'book']) !!}
        @endif
    </div>
</div>