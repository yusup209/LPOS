<!-- jQuery -->

<!-- Bootstrap -->
<script src="{{ asset('assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminlte3/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/adminlte3/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/adminlte3/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/adminlte3/plugins/raphael/raphael.min.js') }}"></script>
{{--<script src="{{ asset('assets/adminlte3/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/adminlte3/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>--}}
<!-- ChartJS -->
<script src="{{ asset('assets/adminlte3/plugins/chart.js/Chart.min.js') }}"></script>

<!-- datatable -->
<script src="{{ asset('assets/adminlte3/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- select2 -->
<script src="{{ asset('assets/adminlte3/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('assets/adminlte3/dist/js/pages/dashboard2.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.table').DataTable({

            buttons: [
                'print',
            ]
        });
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>