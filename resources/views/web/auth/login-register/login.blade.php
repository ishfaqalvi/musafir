<form action="{{ route('auth.login') }}" method="POST" id="loginForm">
    @csrf
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
        <input type="Password" class="form-control border-left-0 outli" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
    </div>
    <div class="form-check form-switch justify-content-between d-flex">
        <div>
            <input class="form-check-input me-3" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Remember me</label>
        </div>
        <a href="{{ route('auth.forgotPassword') }}" class="forget">Forgot password?</a>
    </div>
    <div class="submit-btn" id="loginBtn">
        <button type="submit">LOGIN</button>
    </div>
</form>
