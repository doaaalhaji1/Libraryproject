<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

	<head>

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>Library</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            @if (app()->getLocale() == 'ar')
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-rtl/dist/css/bootstrap.rtl.min.css">
            @endif

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/ionicons.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
	    <link rel="stylesheet" href="css/main.css">
    <style>
       #home {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .home-en {
            background-image: url("/images/bg.jpg"); /* خلفية باللغة الإنجليزية */
        }
        .home-ar {
            background-image: url("/images/bg-ar.jpg"); /* خلفية باللغة العربية */
        }
        .navbar-nav .nav-item {


            margin-left: 20px;
          }


       [dir="rtl"] .header-wrapper {
    padding-left: 0; /* لا توجد هوامش من اليسار في الاتجاه RTL */
    padding-right: 30px; /* الهوامش اليمنى في الاتجاه RTL */
      }

/* الهوامش للنصوص في الاتجاه العربي */
      [dir="rtl"] .description {
        margin-left: 0;
       margin-right: 30px;
       }
       [dir="rtl"] .ms-auto {
    margin-right: auto !important;
    margin-left: 0 !important;
}
[dir="rtl"] .header-title {
    color: white ;
}

[dir="rtl"] .header-sub {
    color: white ;
}
[dir="ltr"] .header-sub {
    color: black ;
}
[dir="rtl"] .description {
    color: white ;
}


    </style>
</head>
<body>

     @include('partials.homenave')

	<!-- Home -->
    <section class="home {{ app()->getLocale() == 'ar' ? 'home-ar' : 'home-en' }}" id="home">
        			<div class="container-fluid">
				 <div class="row">
					<div class="col-xs-6 col-sm-5 col-sm-offset-1">
						<div class="header-wrapper" style="color:black">

							<h1 class="header-title" >{{__('public.Welcome-home')}}</h1>
                            <p class="header-sub"  >
                                {{__('public.description_home')}}
                            </p>
							<p class="description" style=" font-family: Arial, sans-serif;font-weight: bold; bold:20px; ">
                            {!! __('public.unique_experience') !!}

							</p>

                        @if (Route::has('login'))

                            @auth
                                <a href="{{ route('login') }}" class="btn btn-default btn-lg red" role="button">{{__('public.login')}}</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-default btn-lg bttn" role="button">{{__('public.register')}}</a>
                                @endif

                                @else
                                    <a href="{{ route('login') }}" class="btn btn-default btn-lg red" role="button">{{__('public.login')}}</a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-default btn-lg bttn" role="button">{{__('public.register')}}</a>
                                    @endif
                             @endauth

                        @endif
                    </div>
						</div> <!-- /.header-wrapper -->
					</div>	<!-- .col-sm-5 -->
				</div> <!-- .row -->
			</div> <!-- /.container-fluid -->


	</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

