<!DOCTYPE html>
<html class="uk-height-1-1">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @action('head')
        @style('theme', 'extension://system/theme/css/theme.css')
        @script('login', 'system/js/login.js', ['jquery', 'uikit', 'requirejs'])
    </head>
    <body class="uk-height-1-1">

      <div class="tm-height-4-5 uk-vertical-align uk-text-center">
            <div class="uk-vertical-align-middle">

                <img class="tm-logo" src="@url('extension://system/assets/images/pagekit-logo-large.svg')" width="120" height="120" alt="Pagekit">

                @action('messages')

                <form class="js-login js-toggle uk-panel uk-panel-box tm-panel tm-panel-small uk-form" action="@url('@system/auth/authenticate')" method="post">

                    <div class="uk-form-row">
                        <input class="uk-form-large uk-width-1-1" type="text" name="credentials[username]" value="@last_username" placeholder="@trans('Username')" autofocus>
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-password uk-width-1-1">
                            <input class="uk-form-large uk-width-1-1" type="password" name="credentials[password]" value="" placeholder="@trans('Password')">
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <input type="hidden" name="redirect" value="@redirect">
                        @token()
                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1">@trans('Login')</button>
                    </div>
                    <div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox" name="@remember_me_param"> @trans('Remember Me')</label>
                        <a class="uk-float-right uk-link uk-link-muted" data-uk-toggle="{target:'.js-toggle'}" title="Recover your password">@trans('Forgot Password?')</a>
                    </div>

                </form>

                <form class="uk-panel uk-panel-box uk-panel-box-primary tm-panel-login uk-form uk-hidden js-toggle" action="@url('@system/auth/reset')" method="post">

                    <div class="uk-form-row">
                        <input class="uk-form-large uk-width-1-1" type="text" name="login" value="@last_login" placeholder="@trans('Username or Email')" required>
                    </div>
                    <div class="uk-form-row">
                        <button class="uk-button uk-button-primary uk-button-large uk-width-1-1">@trans('Reset Password')</button>
                    </div>

                </form>

            </div>
        </div>

    </body>
</html>