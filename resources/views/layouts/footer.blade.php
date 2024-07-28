<footer class="main-footer">
    <link rel="stylesheet" href="{{ asset('css/scrollToTop.css') }}">
    <a href="#" class="to-top">
        <h3>↑</h3>
    </a>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>

    <script>
        const toTop = document.querySelector(".to-top");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                toTop.classList.add("active");
            } else {
                toTop.classList.remove("active");
            }
        })
        myTimer();
        function myTimer() {
            var me = this;
            //    menuTimeset = $('#timeser');
            currentTime = new Date();
            if (currentTime.getHours() > 12) {
                var hours = currentTime.getHours() - 12;
            } else {
                var hours = currentTime.getHours();
            }
            var displayDateAd =
                hours + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
            $("#timeset").html(displayDateAd);
            var hours = currentTime.getHours();
            am = Date(currentTime, "A");
            var text = "";
            // if (am == 'AM') {
            if (hours >= 0 && hours <= 4) {
                text = "रात्री";
                $("#timeset").html(displayDateAd + " " + text);
            }
            if (hours >= 5 && hours <= 11) {
                text = "बिहानी ";
                $("#timeset").html(displayDateAd + " " + text);
            }
            // } else {
            if (hours >= 12 && hours <= 16) {
                text = "अपरान्ह";
                $("#timeset").html(displayDateAd + " " + text);
            }
            if (hours >= 17 && hours <= 20) {
                text = "सन्ध्या";
                $("#timeset").html(displayDateAd + " " + text);
            }
            if (hours >= 21 && hours <= 23) {
                text = "रात्री";
                $("#timeset").html(displayDateAd + " " + text);
            }
        }

        //reset
        function resetForm(e, thisobj) {
            thisform = thisobj.closest("form");
            selectbox_in_form = thisform.find("select");

            // completely remove selected/input value  when it has been assigned.
            selectbox_in_form.find("option:selected").removeAttr("selected");
            thisform.find("input").removeAttr("value");

            selectbox_in_form.val("");
            selectbox_in_form.change();
            thisform.find("input").val("");
            thisform.find("input").change();

            // delete selectbox_in_form;
            delete thisform.find("input");
            delete thisform;
        }
    </script>

    @if (@$load_js)
        @foreach (@$load_js as $js)
            <script src="{{ asset($js) }}"></script>
        @endforeach
    @endif
    <script type="text/javascript">
      

        @if (@$script_js)
            {!! $script_js !!}
        @endif
    </script>
</footer>
