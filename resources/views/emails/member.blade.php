<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<h1>{{$title ?? ''}}</h1>
<p>{{ $details ?? '' }}</p>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Template</title>
    <style>
        .container_wrap{
            width: 91.25rem;
            margin: 0 auto;
            padding: 0 1.875rem;
        }
        .mail_head {
            border: 1px solid gray;
            background-color: rgb(239 239 239);
            padding: 1.25rem 1.875rem;
        }
        .mail_body{
            border: 1px solid gray;
            border-top: 0;
            border-bottom: 0;
            min-height: 70vh;
            padding: 1.25rem 1.875rem;
        }
        .mail_body p, footer p{
            margin: 0;
        }
        footer{
            margin: 0 auto;
            text-align: center;
            border: 1px solid gray;
            border-top: 0;
            padding: 1.25rem 1.875rem;
        }
    </style>
</head>
<body>
    <div class="container_wrap">
        <div class="mail_head">
            <img src="{{storage_url(settings('site_logo'))}}" height="100px" width="250px" alt="{{settings('site_name')}}">
        </div>
        <div class="mail_body">
            <p>Input here your mail body text.</p>
        </div>
        <footer>
            <p>Copyright © <a href="{{env('APP_URL')}}">INSTITUTE OF CHARTERED SECRETARIES OF BANGLADESH</a>, All rights reserved</p>
        </footer>
    </div>
</body>
</html>

</body>
</html>

