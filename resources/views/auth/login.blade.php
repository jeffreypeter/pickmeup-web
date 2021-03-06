@extends ('layouts.plane')
@section ('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br/><br/><br/>
            @section ('login_panel_title','Please Sign In')
            @section ('login_panel_body')
                @include('shared/alert')
                <form role="form" method="post" action="/login">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password"
                                   value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"></input>
                    </fieldset>
                </form>
                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
                <div style="font-size: 0.85em;margin-left: 10px">
                    <p><a href="#">Forgot Password ?</a></p>
                    <p><a href="{{ url ('register') }}">New User</a></p>
                </div>
            </div>
        </div>
    </div>
@stop