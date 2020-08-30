
@extends('indivLayout')

@section('content')

<div id="artist" style="object-fit:cover; height:1100px">
    <div class="container" >
        <div class="box1">
            <img src="../images/kanna.png"/>
        </div>
        <div class="box2">
            <img src="https://www.vangoghgallery.com/catalog/image/0612/Starry-Night.jpg"/>
        </div>
        <div class="box3">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in elit convallis orci condimentum rhoncus. Aliquam dignissim auctor facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dapibus, ex nec ornare dignissim, enim neque eleifend mi, ut fringilla metus odio vel ante. Pellentesque commodo sodales facilisis. Cras mi diam, gravida et vestibulum ac, gravida eget arcu. In vitae ullamcorper augue, vel ornare ante. Phasellus facilisis ante quis lectus faucibus vestibulum. Integer in efficitur tortor, quis accumsan tortor. Sed efficitur velit nec suscipit porta. Aenean blandit justo ac nibh molestie, id facilisis mauris molestie. Aenean viverra sem neque, sit amet eleifend turpis lacinia eu. Nunc rhoncus tortor non lorem lobortis facilisis. Donec a libero vel mauris interdum interdum. Maecenas viverra suscipit erat. Vivamus turpis nibh, iaculis tincidunt dignissim sagittis, vulputate nec ante.</p>
        </div>

    </div><!--end container-->
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