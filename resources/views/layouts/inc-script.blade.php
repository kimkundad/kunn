<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ url('assets/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/scripts/custom.js') }}"></script>

<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your ปลั๊กอินแชท code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        page_id="109251491247376">
      </div>

{!! setting()->google_analytic !!}

