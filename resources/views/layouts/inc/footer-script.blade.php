
 {{--   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> 

  <script src="https://unpkg.com/axios/dist/jquery.dataTables.min.js"></script> --}}

  <!-- Bootstrap core JavaScript-->
   <script src="{{ asset('theme/vendor/jquery/jquery.dataTables.min.js') }}"></script>


  <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('theme/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('theme/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{asset('theme/js/demo/chart-pie-demo.js') }}"></script>

 
  


  <script>
      $(document).ready(function() {
            $('#myTable').DataTable();
        });
  </script>


