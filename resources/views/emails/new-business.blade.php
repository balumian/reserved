@include('emails.partials.header')

<span class="preheader">Reserved System send you a email notification.</span>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td style="text-align:center">
                            <img src="{{asset('assets/images/logo-login-dark.png')}}" alt="Reserved" style="padding: 15px; width: 170px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="wrapper">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                   <td>
                                        <p>Dear <b>Admin</p><br>
                                        <p>A potential new business has recently registered and is awaiting account activation.</p>
                                        <p>Here are the details of the new user:</p>
                                        <p style="margin-bottom: 0px;"><b>Business Name:</b>&nbsp;{{$messages['business']}}</p>
                                        <p style="margin-bottom: 0px;"><b>Contact Person:</b>&nbsp;{{$messages['name']}}</p>
                                        <p style="margin-bottom: 0px;"><b>Email:</b>&nbsp;{{$messages['email']}}</p>
                                        <p><b>Phone:</b>&nbsp;{{$messages['phone']}}</p>
                                        <p>To proceed with activating the user's account, please Login to the administration panel using your credentials.</p>
                                        <p style="margin-bottom:0px">Best Regards</p>
                                        <p>Reserved System</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="footer">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block powered-by">
                                Powered by <a href="{{env('APP_URL')}}">Reserved</a>.
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>

@include('emails.partials.header')