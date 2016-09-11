
<div class="container" ng-controller="registerController as rc">
    <div class="wrapper">
        <form class="form-signin">
            <h2 class="form-signin-heading">Sign up</h2>
            <input ng-model="rc.signup.username" type="text" class="form-control" name="username" id="username" placeholder="username"/>
            <input ng-model="rc.signup.email"  type="email" class="form-control" name="email" id="email" placeholder="Email Address"/>
            <input ng-model="rc.signup.password"  type="password" class="form-control" name="password" id="password" placeholder="Password" />
            <input ng-model="rc.signup.password2"  type="password" class="form-control" name="password2" id="password2" placeholder="Retype Password"/>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
        </form>
        <button ng-click="rc.sendData(rc.signup)" class="btn btn-lg btn-primary btn-block" id="create_user">Login</button>
    </div>
    <br>
    <p>Already a member? Sign in <a href="login.php">here</a></p>
    <div id="#error-message"></div>
</div>