<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; News Portal
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{asset('backend/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{asset('backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

<!-- Dashboar 1 init js-->
<script src="{{asset('backend/assets/js/pages/dashboard-1.init.js')}}"></script>

<!-- App js-->
<script src="{{asset('backend/assets/js/app.min.js')}}"></script>
<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;

       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;

       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;

       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>

    <!-- third party js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>


     <!-- InputTags js-->
  <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
  <script src="{{ asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

  <!-- Init js-->
  <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
<!-- InputTags js-->
</body>
</html>
