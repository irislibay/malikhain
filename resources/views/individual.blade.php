
@extends('indivLayout')

@section('content')

<div id="wrapper">
        <section id="section1">
            <div class="section-grid">
                <div class="left">
                    <div class="grid-text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis consequuntur officia laboriosam error. Illum numquam est labore suscipit deserunt voluptate aspernatur dolorem, ipsam recusandae cupiditate itaque omnis eum fuga iste?</p>
                    </div>
                </div>
                <div class="right">
                    <div class="grid-image image-1 active"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/0st9yhngses-benjamin-child.jpg" /></div>
                </div>
            </div>
        </section>
        <section id="section2">
            <div class="section-grid">
                <div class="left">
                    <div class="grid-text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis consequuntur officia laboriosam error. Illum numquam est labore suscipit deserunt voluptate aspernatur dolorem, ipsam recusandae cupiditate itaque omnis eum fuga iste?</p>
                    </div>
                </div>
                <div class="right">
                    <div class="grid-image image-2 active"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/2fgvaqx-fxs-oskar-krawczyk.jpg" /></div>
                </div>
            </div>
        </section>
        <section id="section3">
            <div class="section-grid">
                <div class="left">
                    <div class="grid-text">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis consequuntur officia laboriosam error. Illum numquam est labore suscipit deserunt voluptate aspernatur dolorem, ipsam recusandae cupiditate itaque omnis eum fuga iste?</p>
                    </div>
                </div>
                <div class="right">
                    <div class="grid-image image-3 active"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/Great_Wave_off_Kanagawa2_cr.jpg" /></div>
                </div>
            </div>
        </section>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
    // find the top of each section
var section1 = $('#section1').offset().top;
var section2 = $('#section2').offset().top;
var section3 = $('#section3').offset().top;

// number of pixels before the section to change image
var scrollOffset = 300;


// run this function when the window scrolls
$(window).scroll(function() {  
  
   
  // get the window height on scroll
  var scroll = $(window).scrollTop() + scrollOffset;  
  

  // if scroll hits the top of section 1  
  if ( scroll < 500 ) {
    $('.grid-image img').attr('src', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/0st9yhngses-benjamin-child.jpg');
  }
  
  // if scroll hits the top of section 2
  if ( scroll > section2 ) {
    $('.grid-image img').attr('src', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/2fgvaqx-fxs-oskar-krawczyk.jpg');
  }

  // if scroll hits the top of section 3
  if ( scroll > section3 ) {
    $('.grid-image img').attr('src', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/495197/Great_Wave_off_Kanagawa2_cr.jpg');
  }
});

</script>

@endsection