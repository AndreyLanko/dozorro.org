<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/site.css">
    <!--[if lt IE 9]>
        <script src="/assets/js/legacy/html5shiv.min.js"></script>
        <script src="/assets/js/legacy/respond.min.js"></script>
    <![endif]-->
    <link rel='shortcut icon' type='image/x-icon' href='/assets/images/favicon.ico' />
    @include('partials.seo')

    @yield('head')
</head>
<body>
    @if (env('GA_CODE'))
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
            ga('create', '{{env('GA_CODE')}}', 'auto');
            ga('send', 'pageview');
        </script>
    @endif

    @if (env('GTA_CODE'))
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
                    <div class="c-header__nav-wrap">
                        <div style="font-size: 14px;color: #e55166;font-family: 'ProximaNovaBold';text-transform: uppercase;padding: 47px 0 48px 0;display: block;">
                            {{ \App\Classes\User::data()->full_name }}
                        </div>
                    </div>
                @endif
                @include('partials.menu', [
                    'menu' => $main_menu,
                ])
            </div>
        </div>

        @yield('content')

        <div class="last"></div>
    </div>

    @include('partials.footer', [
        'menu' => $main_menu
    ])
    
    <script src="/assets/js/app.js"></script>

    @if (env('YAMETRIC_CODE'))
        <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter{{env('YAMETRIC_CODE')}} = new Ya.Metrika({ id:{{env('YAMETRIC_CODE')}}, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/{{env('YAMETRIC_CODE')}}" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    @endif

<script>

var tenderHeader,
    tenderTabsWrapper;

setTimeout(function(){

    tenderHeader = $('.tender-header').height();
    tenderTabsWrapper = $('.tender-tabs-wrapper').height();

    $(window).scroll(function(){
    if ($(window).scrollTop() > (tenderTabsWrapper + tenderHeader + 118)) {
        $('.tender-tabs-wrapper').css({
            'position': 'fixed',
            'top': '0'
        });
        $('.reviews').css({
	          'padding-top': tenderTabsWrapper
        });
        $('.tender--description').css({
	          'padding-top': tenderTabsWrapper
        });
    } else {
	      $('.tender-tabs-wrapper').css({
            'position': 'relative',
            'top': 0
        });
        $('.reviews').css({
	          'padding-top': 0
        });
        $('.tender--description').css({
	          'padding-top': 0
        });
        
    }

});

}, 300);

$('.jsTenderTabs .tender-tabs__item').click(function() {
    if(!$(this).hasClass('is-show')) {
        if(!$('.jsShowReviews').hasClass('is-show')) {
            $('.tender--description').removeClass('is-show');
	          $('.reviews').addClass('is-show');
        } else if (!$('.jsShowDescription').hasClass('is-show')) {
            $('.reviews').removeClass('is-show');
	          $('.tender--description').addClass('is-show');
        }
        $('.jsTenderTabs .tender-tabs__item').removeClass('is-show');
	      $(this).addClass('is-show');
    }
});

$('.tender-header__link').click(function( event ) {
    event.preventDefault();
    $('.add-review-form').popup({
        transition: 'all 0.3s'
    });
});

$('.jsMainSlider').slick({
	dots: true
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
});

</script>

</body>
</html>