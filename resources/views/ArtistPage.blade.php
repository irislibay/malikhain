@extends('webLayout')

@section('content')
<div class="text-white mb-5" data-aos="fade-up" data-aos-duration="2000">
	<div class="my-5 text-center">
		<p class="display-3 drop-shadow font-weight-bold" style="font-family: 'Megrim', cursive;">Artists</p>
		<p class="h2" style="font-family: 'Major Mono Display', cursive">Meet our featured Filipino classical artists!</p>
	</div>
	<div id="card" class="border-bottom pb-5">
		<div class="content">
			<a class="card" href="#!">
				<div class="front h3" style="font-family: 'Major Mono Display', monospace; background-image: url(https://3.bp.blogspot.com/-bKf33Aw6UH4/TwumHHTFU-I/AAAAAAAAEHg/-AZVlFsnFVY/s640/Ang+Kiukok+2.jpg)">
					<p>Ang Kiukok</p>
				</div>
				<div class="back">
					<div>
						<p>National Artist.</p>
						<p>A Filipino painter of Chinese descent and was a National Artist for Visual Arts.</p><button class="button">Know more</button>
					</div>
				</div>
			</a>
			<a class="card" href="#!">
				<div class="front h3 " style="font-family: 'Major Mono Display', monospace;  background-image: url(https://upload.wikimedia.org/wikipedia/commons/b/b0/Jose_rizal_01.jpg)">
					<p>Jose Rizal</p>
				</div>
				<div class="back">
					<div>
						<p>National hero of the Filipino people.</p>
						<p>An ophthalmologist by profession, a writer, and a key member of the Filipino Propaganda Movement.</p><button class="button">Know More</button>
					</div>
				</div>
			</a>
			<a class="card" href="#!">
				<div class="front h3" style="font-family: 'Major Mono Display', monospace;  background-image: url(https://images.summitmedia-digital.com/esquiremagph/images/2017/01/20/juan.png)">
					<p>Juan Luna</p>
				</div>
				<div class="back">
					<div>
						<p>World-renowned artist.</p>
						<p>Gold-medalist in 1884 Madrid Exposition of Fine Arts.</p><button class="button">Know More</button>
					</div>
				</div>
			</a>
			<a class="card" href="/ArtistPage/individual">
				<div class="front h3" style="font-family: 'Major Mono Display', monospace; background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Self_portrait_of_F%C3%A9lix_Resurrecci%C3%B3n_Hidalgo.jpg/330px-Self_portrait_of_F%C3%A9lix_Resurrecci%C3%B3n_Hidalgo.jpg)">
					<p>Francisco Balagtas</p>
				</div>
				<div class="back">
					<div>
						<p>Creator of cultural touchstone.</p>
						<p>He is widely considered one of the greatest Filipino literary laureates for his impact on Filipino literature. </p><button class="button">Know More</button>
					</div>
				</div>
			</a>
			<a class="card" href="#!">
				<div class="front h3" style="font-family: 'Major Mono Display', monospace;  background-image: url(https://www.artcircle-gallery.com/wp-content/uploads/2017/03/13256243_1718585861758185_1750782011660232265_n.jpg)">
					<p>Manuel Baldemor</p>
				</div>
				<div class="back">
					<div>
						<p>The folk artist.</p>
						<p>He has contributed more than 24 designs for reproduction on UNICE’s greeting cards and are distributed worldwide.</p><button class="button">Know More</button>
					</div>
				</div>
			</a>
			<a class="card" href="#!">
				<div class="front h3" style="font-family: 'Major Mono Display', monospace; background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Pacita_Abad.jpg/220px-Pacita_Abad.jpg)">
					<p>Pacita Abad</p>
				</div>
				<div class="back">
					<div>
						<p>TOYM-awardee. <br>(Ten Outstanding Young Men)</p>
						<p>Pacita Abad became the first woman ever to receive this prestigious award.</p><button class="button">Know More</button>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
		

        
@endsection