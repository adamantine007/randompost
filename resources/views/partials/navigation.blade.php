<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="row">
            <div class="col-xs-1 col-xs-offset-0 col-sm-1 col-sm-offset-1 col-md-1 col-md-offset-2 col-lg-1 col-lg-offset-3">
                <a href="/"><i class="fa fa-home fa-3x"></i></a>
            </div>

            @if(Auth::guest())
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="/auth/login"><i class="fa fa-sign-in fa-3x"></i></a>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="/auth/register"><i class="fa fa-user-plus fa-3x"></i></a>
                </div>
            @else
                {{--<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">--}}
                    {{--<a href="/articles"><i class="fa fa-file-text-o fa-3x"></i></a>--}}
                {{--</div>--}}

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="/books"><i class="fa fa-book fa-3x"></i></a>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="/auth/logout"><i class="fa fa-sign-out fa-3x"></i></a>
                </div>
            @endif
        </div>

    </div>
</nav>