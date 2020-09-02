@extends('layouts.web.index')

@section('content')

<div id="artist" style="object-fit:cover; height:1100px">
    <div class="container" >
        <div class="row main-row">
            <div class="col-5 box1">
                <div class="card-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Pacita_Abad.jpg/220px-Pacita_Abad.jpg"/>
                </div>
            </div>
            <div class="col-7">
                <div class="row row-nest">
                    <div class="col-12 box2">
                        <div class="card">
                            <img src="https://i.ocula.com/anzax/fd/fda855b1-39fa-4216-8696-2464b7ad3a1d_750_557.jpg"/>
                            <div class="contentbx">
                                <h2>Paint 1</h2>
                                <div class="paintName">
                                    <h3>A Starry Night</h3>
                                </div>
                                <a href="#"> View</a>
                            </div>
                        </div>
                        <div class="card">
                           <img src="https://i.ocula.com/anzax/b0/b00f5387-c820-4a20-9c3a-f68432e9db9e_650_588.jpg"/>
                            <div class="contentbx">
                                <h2>Paint 2</h2>
                                <div class="paintName">
                                    <h3>Wave</h3>
                                </div>
                                <a href="#"> View</a>
                            </div>
                        </div>
                        <div class="card">
                            <img src="https://www.artstor.org/wp-content/uploads/2018/12/pacita_abad_l01_260378_8b_srgb.jpg"/>
                             <div class="contentbx">
                                 <h2>Paint 3</h2>
                                 <div class="paintName">
                                     <h3>Wave</h3>
                                 </div>
                                 <a href="#"> View</a>
                             </div>
                        </div>
                        <div class="card">
                            <img src="https://d32dm0rphc51dk.cloudfront.net/QZfHjRlBWhuRqpLkF_68Gw/large.jpg" class="lebady"/>
                             <div class="contentbx">
                                 <h2>Paint 4</h2>
                                 <div class="paintName">
                                     <h3>Wave</h3>
                                 </div>
                                 <a href="#"> View</a>
                             </div>
                        </div>
                    </div>
                    <div class="col-12 overbox">
                        <div class="box4">
                            <div class="card-scroll2">
                                <h2> Pacita Barsana Abad</h2>
                                <p> Alma mater: University of the Philippines Diliman, Lone Mountain College/University of San Francisco<br>
                                    Birthdate: October 5 1946<br>
                                    Deathdate: December 7 2004<br>
                                    Age: 58<br>
                                    AKA: -<br>
                                    Spouse: Jack Garrity
                                    </p>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="card-scroll">
                                <h2> Life of Pacita Abad</h2><br>
                                <p>Both of Abad's parents served, at different times, as Congressman/Congresswomen of Batanes, and Abad earned a BA in political science at the University of the Philippines Diliman in 1967. In 1970, she went to the United States intending to study law, but she instead earned a master's degree in Asian history at Lone Mountain College (which would later become part of the University of San Francisco) in 1972 while supporting herself as a seamstress and a typist. Abad studied painting at the Corcoran School of Art in Washington, D.C. and The Art Students League in New York City. She lived on six continents and worked in more than 50 countries, including Guatemala, Mexico, India, Afghanistan, Yemen, Sudan, Mali, Papua New Guinea, Cambodia, and Indonesia. At the Corcoran School of Art, Abad studied under Berthold Schmutzhart and Blaine Larson, and the two professors helped launch her artistic career.<br><br>
                                During Abad's time in San Francisco's art scene, she married painter George Kleiman, though they later separated. She traveled to art scenes across Asia for a year with Stanford business student Jack Garrity, then returned to the U.S. to study painting, first at the Corcoran School of Art in Washington D.C. and later, at The Art Students League in New York City. While in California, she married Garrity, who became an international development economist.<br><br>
                                Abad created over 4,500 artworks in her career. Her early paintings were primarily figurative socio-political works of people and primitive masks. Another series was large scale paintings of underwater scenes, tropical flowers, and animal wildlife. Pacita's most extensive body of work, however, is her vibrant, colorful abstract work - many very large scale canvases, but also a number of small collages - on a range of materials from canvas and paper to bark cloth, metal, ceramics, and glass. She painted the 55-meter long Alkaff Bridge in Singapore and covered it with 2,350 multicolored circles, just a few months before she died of lung cancer in 2004 in Singapore.<br><br>
                                Abad developed a technique of trapunto painting (named after a quilting technique), which entailed stitching and stuffing her painted canvases to give them a three-dimensional, sculptural effect. She then began incorporating into the surface of her paintings materials such as traditional cloth, mirrors, beads, shells, plastic buttons, and other objects.</p>
                
                            </div>
                        </div>
                    </div>
            </div>

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
