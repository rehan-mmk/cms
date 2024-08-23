

<div style="width: 200px; margin: auto; border: 1px solid #ccc;">
<div style="margin: 30px 0; color: rgb(2, 79, 109); font-size: 30px;  text-align: center;">Register</div>

<form action="{{ route('register') }}" method="post" style="display: inline-block; margin: 0 20px;">
    @csrf
    <div>
        <label>Full Name</label><br>
        <input type="text" class="@error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}">
        @if ($errors->has('fullname'))
            <span style="color: red;">{{ $errors->first('fullname') }}</span>
        @endif
    </div>

    <div style="margin-top: 15px;">
        <label>Email Address</label><br>
        <input type="email"name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span style="color: red;">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div style="margin-top: 15px;">
        <label>Password</label><br>
        <input type="password" name="password">
        @if ($errors->has('password'))
            <span style="color: red;">{{ $errors->first('password') }}</span>
        @endif
    </div>


    <div style="margin-top: 15px;">
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </div>


    <div style="margin-top: 30px; text-align: center;">
        <input type="submit" value="Register">
    </div>
    
</form>
</div>
