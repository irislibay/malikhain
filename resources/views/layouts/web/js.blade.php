<script src="{{ asset('js/app.js') }}"></script>

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

{{-- Popper.js --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

{{-- TODO: Remove this once we're loading Bootstrap via NPM --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

{{-- AOS --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

{{-- TODO: Move to NPM --}}
<script>
    function type($target) {
    //stop typing when hover is off//
        if ($target.Stop) {
            return;
        }
        if ($target.index < $target.caption.length) {
            $target.text($target.text() + $target.caption.charAt($target.index));

            $target.index++;

            setTimeout(function() {
            type($target);
            }, 50);
        }
    }
    $(document).ready(function() {
        var $figures = $(".wiggly");
        $figures.each(function() {
            let $figure = $(this);

            let $caption = $figure.find("figcaption");

            $caption.caption = $caption.text();
            $caption.index = 0;
            $caption.text("");
            $caption.Stop = false;
            let $img = $figure.find("img");
            $figure.hover(
                function(e) {
                    $caption.Stop = false;
                    type($caption);
                },
                function() {
                    $caption.Stop = true;
                    $caption.text("");
                    $caption.index = 0;
                }
            );
        });
    });
</script>

@yield('scripts')
