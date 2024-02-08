<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item-image-parent mx-2">
                            <div class="item-list-vertical">
                                <div class="thumb-box">
                                    <img src="{{url('assets/website/images/geladeira.jpeg')}}" alt="thumbnail" />
                                </div>
                                <div class="thumb-box">
                                    <img src="{{url('assets/website/images/geladeira-p.jpeg')}}" alt="thumbnail" />
                                </div>
                                <div class="thumb-box">
                                    <img src="{{url('assets/website/images/geladeira-t.jpeg')}}" alt="thumbnail" />
                                </div>
                                <div class="thumb-box">
                                    <img src="{{url('assets/website/images/geladeira.jpeg')}}" alt="thumbnail" />
                                </div>

                            </div>
                            <div class="item-image-main">
                                <img src="{{url('assets/website/images/geladeira-p.jpeg')}}" alt="default" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item-info-parent mx-2 my-4">
                            <!-- main info -->
                            <div class="main-info">
                                <h3 class="font-weight-bold text-dark">GELADEIRA 2 PORTAS</h3>
                                <h4 class="">Design moderno, revestimento em tecido de alta qualidade, assento profundo e almofadas macias para máximo conforto, durabilidade e resistência, versatilidade para diversos estilos de decoração. Aproveite a oferta limitada para transformar sua sala com estilo.</h4>
                                <hr>
                                <div class="mt-3">
                                    @if(!true)
                                        <small class="font-weight-bold font-size-20">R$ 230,99</small>
                                    @endif
                                    @if(true)
                                        <small class="text-secondary font-size-14"><strike>R$ 230,99</strike></small>
                                    @endif
                                </div>
                                @if(true)
                                    <div class="">
                                        <small class="font-weight-bold font-size-20">R$ 199,99</small>
                                    </div>
                                @endif
                                <hr>
                            </div>
                            <!-- Choose -->
                            <div class="select-items">

                                <div class="change-color my-2">
                                    <label><b>Cor:</b> Preto</label><br>
                                    <div class="thumb-box">
                                        <img src="{{url('assets/website/images/geladeira.jpeg')}}" alt="thumbnail" />
                                    </div>
                                    <div class="thumb-box">
                                        <img src="{{url('assets/website/images/geladeira-p.jpeg')}}" alt="thumbnail" />
                                    </div>
                                </div>

                                <div>
                                    <h3>Voltagem</h3>

                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem110" autocomplete="off"> 110V
                                        </label>
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> 220V
                                        </label>
                                        <label class="btn btn-add-cart">
                                            <input type="radio" name="voltagem" id="voltagem220" autocomplete="off"> Bivolt
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-add-cart "><i class="fa-solid fa-cart-plus"></i> Adicionar ao carrinho</button>
                        <button type="button" class="btn btn-share-whatsapp "><i class="fa-brands fa-whatsapp"></i> Compartilhar por whatsapp</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
