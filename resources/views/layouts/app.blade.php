<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{ elixir('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('assets/css/site.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    @stack('styles')
    <!--[if lt IE 9]>
        <script src="/assets/js/legacy/html5shiv.min.js"></script>
        <script src="/assets/js/legacy/respond.min.js"></script>
    <![endif]-->
    <link rel='shortcut icon' type='image/x-icon' href='/assets/images/favicon.ico' />
    @include('partials.seo')
    @yield('head')
</head>
<body class="{{ \Route::currentRouteName()=='homepage'?'index-page':'' }}">
    @if (!empty(env('GA_CODE')))
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
            ga('create', '{{env('GA_CODE')}}', 'auto');
            ga('send', 'pageview');
        </script>
    @endif

    @if (!empty(env('GTA_CODE')))
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{env('GTA_CODE')}}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{{env('GTA_CODE')}}');</script>
    @endif

    <div class="wrapper-main">
        <div class="c-header">
            <div class="container">
                <a href="/" class="c-header__logo"></a>
                @include('partials.lang', [
                    'locales' => $locales,
                ])
                @if (\App\Classes\User::isAuth())
                    <div class="user-name">

                            {{ \App\Classes\User::data()->full_name }}

                    </div>
                @endif

                <div class="c-header__nav-wrap nav-header">
                    <div class="js-menu menu-icon">
                        <span></span>
                    </div>
                    @include('partials.menu', [
                        'menu' => $main_menu,
                        'depth' => 0,
                    ])
                </div>
            </div>
        </div>

        @yield('content')

        <div class="last"></div>
    </div>

    @include('partials.footer', [
        'menu' => $bottom_menu
    ])
    
    <script src="{{ elixir('assets/js/app.js') }}"></script>

    @if (env('YAMETRIC_CODE'))
        <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter{{env('YAMETRIC_CODE')}} = new Ya.Metrika({ id:{{env('YAMETRIC_CODE')}}, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/{{env('YAMETRIC_CODE')}}" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    @endif

<script>

$('.jsTenderTabs .tender-tabs__item').click(function() {
    var index=$(this).index('.tender-tabs__item');
    $('[tab-content]').hide();
    $('[tab-content]').eq(index).show();
    $('.jsTenderTabs .tender-tabs__item').removeClass('is-show');

    $(this).addClass('is-show');
});

$('.tender-header__link').click(function( event ) {
    event.preventDefault();
    $('.add-review-form').popup({
        transition: 'all 0.3s'
    });
});

$('.jsGetInputVal').change(function() {
	
	if($(this).val().length >= 1) {
		$(this).addClass('with-text');
	} else {
		$(this).removeClass('with-text');
	}
});

$(document).ready(function(){
    $(".tender-header__review-button").sticky({topSpacing:20});
    $(".tender-tabs-wrapper").sticky({topSpacing:0});
});

</script>
    @stack('scripts')
</body>
</html>