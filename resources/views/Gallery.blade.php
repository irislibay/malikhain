@extends('layouts.web.index')

@section('content')

    <div class="container text-white my-5">
        <div class="text-white text-center mb-5" data-aos="fade-up" data-aos-duration="2000">
            <p class="display-4 drop-shadow font-weight-bold"
                style="font-family: 'Megrim', cursive;">
                Exhibit
            </p>
            <span class="h3"
                style="font-family: 'Major Mono Display', cursive">
                Style-content-fused works using artificial intelligence
            </span>
        </div>

        <div id="card" class="border-bottom pb-5">
            <div class="content">
                @foreach($images as $image)
                    <a class="card james-transparent" href="{{ '/ArtistPage/'.str_replace(' ', '', explode('/', explode('/styles/', $image->styleimg)[1])[0]) }}">
                        <div class="front"
                            style="background-image: url({{ config('app.malikhain_flask_api_base_url').'/nst/uploads/'.$image->filename = explode('-', $image->filename)[0].'.png' }}); object-fit: cover;">
                        </div>
                        <div class="back" style="background-image: url({{ config('app.malikhain_flask_api_base_url').'/nst/files/'.$image->filename = explode('.', $image->filename)[0].'-500.png'  }}); object-fit: cover;">
                            <div>
                                <button class="button" style="margin-top: 200px;">Know more</button>
                            </div>
                        </div>
                    </a>
                @endforeach

                @foreach($poems as $poem)
                    <div class="card james-transparent">
                        <div class="front" style="background: linear-gradient(135deg, #845EC2, #FFC75F);">
                            <div class="text-white mt-5" >
                                <p style="margin-top: 10px; text-align: center;">
                                    {!! file_get_contents('uploads/'.$poem->filename) !!}
                                </p>
                            </div>
                        </div>
                        <div class="back" style="overflow: hidden;">
                            <div class="text-white mt-5" style="position: absolute; z-index: -1;">
                                <p style="margin-top: 10px;">
                                    {!! $poem->text  !!}
                                </p>
                            </div>
                            <button type="button" class="button" data-toggle="modal" data-target="{{ '#modal'.$loop->index }}" style="margin-top: 200px; margin-left: 10px; margin-right: 10px;">View more</button>
                        </div>
                    </div>
                    <div id="{{ 'modal'.$loop->index }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="background: linear-gradient(135deg, #845EC2, #FFC75F);">
                                <div class="modal-header">
                                    <div class="title-modal">Generated Output</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $poem->text  !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="overlay" style="z-index: 3;"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
