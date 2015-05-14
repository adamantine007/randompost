<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Title form field -->
        <div class="form-group" style="margin-top: 10px; margin-bottom: 5px">
            {{--{!! Form::label('name', 'Name:') !!}--}}
            @if( ! empty($book_name))
                {!! Form::text('name', $book_name, ['class' => 'form-control', 'placeholder' => 'Book name...']) !!}
            @else
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Book name...']) !!}
            @endif
        </div>
    </div>
</div>