<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}">
    <title>
        @if(isset($page_title))
            {{ $page_title }}
        @else
            @if(isset(systemSetting()->app_name))
                {{ systemSetting()->app_name }}
            @else
                {{ env('APP_NAME') }}
            @endif
        @endif
        | {{ trans('errorPage.404.title') }}
    </title>
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 text-danger">
           <strong class="{{setFont()}}">
               401
           </strong>
        </h1>
        <p class="fs-3 {{ setFont() }}">
            तपाईले खोज्नु भएको फाइललाई अनुमति दिइएको छैन!
        </p>
        <p class="fs-3">
            <span class="text-danger">Oops!</span>
            The file you are looking for is not authorized!
        </p>
        <p class="lead">
            The file you’re looking for doesn’t exist.
        </p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-rounded rounded-pill {{ setFont() }}">
            <i class="fa fa-arrow-circle-o-left"></i>
            {{ trans('errorPage.401.error_back') }}
        </a>
    </div>
</div>
</body>

</html>
