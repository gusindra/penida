@section('content')
<div id="loginbox">            
    @include('partials.messages')
    {{ Form::open(array('url' => route('login'))) }}
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <input type="text" name="username" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <input type="password" name="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-large btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><button type="submit"  class="btn btn-large btn-success" /> Login</button></span>
        </div>
    {{ Form::close() }}
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
        
            <div class="controls">
                <div class="main_input_box">
                    <input type="text" placeholder="E-mail address" />
                </div>
            </div>
        
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-large btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-large btn-info"/>Recover</a></span>
        </div>
    </form>
</div>
@endsection