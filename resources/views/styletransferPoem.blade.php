@extends('webLayout')

@section('content')

<div id="wrapper">
	<div id="featured-wrapper">
		<div id="featured" class="extra2 margin-btm tray">
			<div class="main-title">
				<h2 data-aos="fade-up" data-aos-duration="2000">
                    Poem Style Transfer
                </h2>
				<span class="byline">Fuse your poem with your chosen Filipino artist's work</span>
                <br /><br />

                <div class="featured">
                    <form action="{{ route('poem.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                                <div class="card shadow">
                                    <div class="card-header bg-info text-white">
                                    </div>
                                    <div class="card-body">
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {!! Session::get('success') !!}
                                                @php
                                                    Session::forget('success');
                                                @endphp
                                            </div>
                                        @endif
                                        <div class="form-group" {{ $errors->has('poem') ? 'has-error' : '' }}>
                                            <textarea class="form-control" id="poem" name="poem" style="resize:none" rows="15"></textarea>
                                            <span class="text-danger"> {{ $errors->first('poem') }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-md"> Upload </button>
                                        </div>
                                        {{ csrf_field() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>


@endsection
