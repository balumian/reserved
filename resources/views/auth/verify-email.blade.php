@extends('layouts.frontend')
@section('title','Reserved')
@section('content')
<div class="login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <div class="login-img">
                    <img class="img-fluid" src="assets/images/login-bg.jpg" alt="reserved">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 align-self-center">
                <div class="login-form verify-email-log">

                    <img class="img-fluid verify-email" src="assets/images/email-verify.png">

                    <h1>Verify Your Email

                        <em class="subtitle">You wil need to verify your email to Complete registration</em>
                    </h1>
                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="lgn-btn-bg">
                            <div class="row">
                                <div class="col-lg-12 col-12">

                                    <button type="submit" class="login-submit">RESEND EMAIL</button>


                                    <small>An email has been sent to
                                        {{auth()->user()->email}}
                                        with a link to verify your account. if you have not received the email after few
                                        minutes, please check your spam folder</small>
                                </div>


                            </div>
                        </div>



                    </form>



                </div>
            </div>

        </div>
    </div>
</div>
@stop