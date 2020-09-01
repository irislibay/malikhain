@extends('layouts.web.index')

@section('content')

<div id="artist" style="object-fit:cover; height:1100px">
    <div class="container" >
        <div class="word_split wrapper">
            <span class="word word1" style="text-align:left;">Francisco </span>
            <span class="word word2">Balagtas</span>
            <span class="word word3">Personal</span>
            <span class="word word4">Details</span>
            <span class="word word5">Employment</span>
            <span class="word word6">History </span>
            <span class="word word7">Education</span>
            <span class="word word8">Personal</span>
            <span class="word word9">Skills </span>
            <span class="word word10">Technical</span>
            <span class="word word11">Skills </span>
            <span class="word word12">Get In </span>
            <span class="word word13">Touch</span>

            <div class="bubble2">
            <span class="the-arrow2"></span>
            <img src="https://3.bp.blogspot.com/-i60NKbeMeOw/T0YUqU1_AQI/AAAAAAAABj4/3i7a6Zgo_lo/s1600/Francisco+Baltazar+y+dela+Cruz.jpg"/>
            </div>
            <div class="bubble3">
            <span class="the-arrow3"></span>
            NATIONALITY...<br/>
            LOCATION...<br/>
            BIRTHDAY...<br/>
            HOBBIES<br/>
            ETC...<br/>
            ETC...<br/>
            </div>
            <div class="bubble4">
            <span class="the-arrow4"></span>
            GRAPHIC DESIGNER 2005 - 2007<br/>
            Lorem Ipsum dolor sit amet. Lorem Ipsum dolor.<br/><br/>
            CREATIVE DIRECTOR 2008 - Current
            <br/>
            Lorem Ipsum dolor sit amet.

            </div>
            <div class="bubble5">
            <span class="the-arrow5"></span>
            HIGH SCHOOL<br/>
            Lorem Ipsum dolor sit amet<br/>
            May 2004, GPA 1.5<br/><br/>
            UNIVERSITY <br/>
            Lorem Ipsum dolor sit amet<br/>
            July 2007, GPA 1.5

            </div>
            <div class="bubble6">
            <span class="the-arrow6"></span>
            SOCIAL COMMITMENT<br/>
            ORGANIZATION<br/>
            CREATIVITY<br/>
            COMMUNICATION<br/>
            TEAMWORK<br/>
            </div>
            <div class="bubble7">
            <span class="the-arrow7"></span>
            PHOTOSHOP<br/>
            ILLUSTRATOR<br/>
            INDESIGN<br/>
            FLASH<br/>
            DREAMWEAVER<br/>
            XHTML/CSS<br/>
            JAVASCRIPT<br/>
            </div>
            <div class="bubble8">
            <span class="the-arrow8"></span>
            PHONE...<br/>
            EMAIL...<br/>
            WEBSITE... <br/>
            TWITTER...<br/>
            FACEBOOK...<br/>
            DRIBBBLE...<br/>
            </div>
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
