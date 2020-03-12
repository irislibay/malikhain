@extends('webLayout')

@section('content')



{{-- Carousel --}}
<div class="my-5 text-center tray"  data-aos="flip-up">
    <div class="row d-flex align-items-center">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                <div class="carousel-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                </svg>
                </div>
            </a>
        </div>
        <div class="col-10">
            <!--Start carousel-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div style="background-image:url('https://i.kym-cdn.com/photos/images/original/001/510/490/e7f.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                        </div>
                        <div style="background-image:url('https://i.kym-cdn.com/photos/images/newsfeed/001/389/404/a2b.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                        </div>
                        <div style="background-image:url('https://pm1.narvii.com/7052/120ba3e19cdaace371173b23501b7a3b385cf82dr1-1125-1097v2_hq.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                            <h3 style="color: white">*sad meow*</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div style="background-image:url('https://i.redd.it/31ze1nceza631.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                        </div>
                        <div style="background-image:url('https://i.redd.it/3d43d31qy4c41.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                        </div>
                        <div style="background-image:url('https://i.pinimg.com/originals/0a/72/ef/0a72efd2abb871f9afb7d31b07142cb2.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--End carousel-->
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
            <div class="carousel-nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                </svg>
            </div>
            </a>
        </div>
    </div>
    </div>
</div>


<div id="wel" style= "background-color: #FFEDBC">

	<div class="tray" data-aos="zoom-in-up" >
		<h2 data-aos="fade-up"
        data-aos-duration="2000">Bridging the world of art and technology.</h2>
        <p style="font-size: 27px" data-aos="flip-left">Welcome to malikhain, young artist!</p>
        <p style="font-size: 27px" data-aos="flip-up"><strong>malikhain</strong> is a web application that creates a fusion of your own masterpiece and a
        classic Filipino artist's masterpiece using Deep Artificial Networks.</p>
        <a href="/workshop" class="btn">I want to try!</a> </div>

</div>



@endsection