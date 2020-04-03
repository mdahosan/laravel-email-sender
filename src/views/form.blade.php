<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <style>
        .content{width: 600px; margin: 0 auto; background: rgba(33, 140, 255, 0.64); padding: 5px; text-align: center;}
        input, textarea{ width: 98%}
        input{ height: 30px; padding: 5px;}
        textarea{padding: 5px;}
    </style>
</head>

<body>

<div class="content">
    <h2 style="color: white; text-decoration: underline; font-weight: bolder;">PONDIT Emailer</h2>
    @isset ($message)
        <div style="background: #33b85e; color: white;">
            <strong>Well done ! </strong> {{ $message }}.
        </div>
    @endisset
    <form method="post" action="{{ route('mailer') }}" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>Email Sender Form</legend>
            <input type="text" name="sender_name"  required placeholder="Enter Sender Name"><br><br>
            <input type="email" name="email_from" id="" placeholder="Enter From Email"><br><br>
            <textarea name="email_to" id="" cols="77" rows="3" placeholder="Enter To Emails"></textarea><br><br>
            <input name="reply_mail" type="email" placeholder="Enter Reply To Email" required><br><br>
            <input name="subject" type="text" placeholder="Enter Subject" required><br><br>
            <input name="introduction" type="text" placeholder="Enter Email Introduction"><br><br>
            <input name="thanks_text"  placeholder="Enter Thanking Text"><br><br>
            <textarea name="message" id="" cols="77" rows="5" placeholder="Enter Message"></textarea><br>
        </fieldset>

        <button type="submit" style="margin-top: 5px; background: #126148; color: white; height: 50px; padding: 5px;  width: 120px; margin-right: 0px;">Send</button>

    </form>
</div>

<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('message', {
        uiColor: '#9AB8F3'
    });
</script>


</body>
</html>
