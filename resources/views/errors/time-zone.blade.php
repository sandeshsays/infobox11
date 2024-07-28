<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}">
    <title>
        @if( isset($page_title)) {{@$page_title}}@else @if(isset(systemSetting()->app_name)){{systemSetting()->app_name}} @else {{ env('APP_NAME') }}  @endif  @endif
        | {{ trans('errorPage.404.title') }}
    </title>
    <link href="{{asset('css/error.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>


<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold" style="color: #2260bf">204</h1>
        <p class="fs-5 {{setFont()}}">
            तपाईंको कम्प्युटरको मिति र समय गलत छ। यसको कारण, तपाईंले वेब साइट पहुच गर्न सक्नुहुन्न !.
        </p>
        <p class="fs-4"> <span class="text-danger">Opps!</span> Your computer's date and time are incorrect. Because of this, you cannot access the web site!.</p>
        <p class="lead {{setFont()}}">
            तपाईंले कम्प्युटरको कलेन्डर र समय सेटिङ्गमा गएर  समय र मिति सेट गर्न सक्नुहुनेछ।
        </p>
        <a
                href="{{url('/')}}"
                class="btn btn-primary btn-rounded  rounded-pill {{setFont()}}"
        >
            <i class="fa fa-refresh"></i>
            पुन: प्रयास
        </a>
    </div>
</div>
</body>


</html>