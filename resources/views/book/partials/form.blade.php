<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Title form field -->
        <div class="form-group" style="margin-bottom: 10px">
            {{--{!! Form::label('name', 'Name:') !!}--}}
            @if( ! empty($book_name))
                {!! Form::text('name', $book_name, ['class' => 'form-control', 'placeholder' => 'Book name...']) !!}
            @else
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Book name...']) !!}
            @endif
        </div>
    </div>

    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
        {{--{!! Form::checkbox('access', 1, 0, ['data-on-text' => 'Public', 'data-off-text' => 'Private']) !!}--}}
    {{--</div>--}}
</div>