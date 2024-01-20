<!doctype html>
<html lang="pt-br">
@include('website.header')

<div id="hero-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{url('assets/website/banner.jpeg')}}" alt="First slide">
        </div>
    </div>
</div>

<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/804c1760c71750b68cbeb43621c7455d.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
@include('website.footer')

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>

</html>
<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
