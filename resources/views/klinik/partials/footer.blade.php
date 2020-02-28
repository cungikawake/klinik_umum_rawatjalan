    
     
    <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  
                </li>
                 
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by gentamasbali.com 
              </span>
            </div>
          </div>
        </div>
      </footer>
    <!--main panel-->
    </div>
  </div>
  <!--wraper-->

<!--   Core JS Files   -->
<script src="{{ asset('front/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('front/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Chart JS -->
{{--<script src="{{ asset('front/assets/js/plugins/chartjs.min.js') }}"></script>--}}

<!--  Notifications Plugin    -->
<script src="{{ asset('front/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('front/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('front/assets/demo/demo.js') }}"></script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
  
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
@yield('scripts')
 
</body>
</html>
