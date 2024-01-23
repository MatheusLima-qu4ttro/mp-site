<!doctype html>
<html lang="pt-br">
@include('website.header')

@yield('content')

<!-- Botão WhatsApp flutuante -->
<a href="https://web.whatsapp.com/send?phone=+554298710091" target="_blank" class="whatsapp-btn btn btn-success">
    <i class="fab fa-whatsapp"></i>
</a>

@include('website.footer')


<script src="{{ url('assets/website/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{url('assets/website/instafeed.js')}}"></script>
<script src="{{ url('assets/website/jquery-3.7.1.slim.js') }}" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{{url('assets/website/popper.min.js')}}"></script>
<script src="{{url('assets/website/bootstrap.min.js')}}"></script>
<script src="{{url('assets/website/holder.min.js')}}"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>

</html>
<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
