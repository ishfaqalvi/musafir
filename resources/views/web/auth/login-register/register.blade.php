<form action="{{ route('auth.register') }}" method="POST" id="registerForm">
    @csrf
    <div class="input-group">
        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
            <img src="{{ asset('assets/web/img/Mail.svg') }}" alt="">
        </span>
        <input type="name" class="form-control border-left-0" placeholder="Name" aria-label="name" aria-describedby="basic-addon1" name="name">
    </div>
    <div class="input-group">
        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
            <img src="{{ asset('assets/web/img/Mail.svg') }}" alt="">
        </span>
        <input type="text" class="form-control border-left-0" placeholder="User Name" aria-label="userName" aria-describedby="basic-addon1" name="userName">
    </div>
    <div class="input-group">
        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
            <img src="{{ asset('assets/web/img/Message.svg') }}" alt="">
        </span>
        <input type="email" class="form-control border-left-0" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email">
    </div>
    <div class="input-group">
        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
            <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
        </span>
        <input type="password" class="form-control border-left-0 outli" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" id="password">
    </div>
    <div class="input-group">
        <span class="input-group-text bg-transparent py-lg-3 border-right-0" id="basic-addon1">
            <img src="{{ asset('assets/web/img/Lock.svg') }}" alt="">
        </span>
        <input type="password" class="form-control border-left-0 outli" placeholder="Confirm password" aria-label="Password" aria-describedby="basic-addon1" name="confirm_password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="agree" id="agree" value="yes">
        <label class="form-check-label" for="agree">
            By registering, you agree to our terms & conditions and privacy policy
        </label>
    </div>
    <div class="submit-btn" id="signupBtn">
        <button type="submit">SIGN UP</button>
    </div>
</form>
