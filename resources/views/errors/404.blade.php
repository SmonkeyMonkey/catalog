@extends('layout')


@section('content')
<!-- Error page -->
<section class="error py-5">
    <div class="container py-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> Ошибка </h3>
        <div class="error_content">
            <div class="content_left">
                <h2 class="font-weight-bold">404</h2>
                <h5 class="text-capitalize">Запрашиваемая вами страница не существует либо временно недоступна </h5>
                <p class="mt-3">Пожалуйста,обратитесь к администратору страницы если вы уверенны что ошибка недействительна </p>
                <div class="back_to_index mt-4">
                    <a href="{{ route('index') }}" class="text-capitalize">Вернуться на главную</a>
                </div>
                <p class="text-capitalize my-3">Проверьте правильно ли указан URL страницы</p>

            </div>
        </div>
    </div>
</section>
<!-- //Error page -->
@endsection
<!-- js-scripts -->

<!-- js -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

<!-- start-smoth-scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {

            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>