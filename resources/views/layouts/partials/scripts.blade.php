<!-- jquery latest version -->
<script src="{{ asset('assets/login/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('assets/login/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/login/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/login/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/login/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/login/js/jquery.slicknav.min.js') }}"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="{{ asset('assets/login/js/line-chart.js') }}"></script>
<!-- all pie chart -->
<script src="{{ asset('assets/login/js/pie-chart.js') }}"></script>
<!-- others plugins -->
<script src="{{ asset('assets/login/js/plugins.js') }}"></script>
<script src="{{ asset('assets/login/js/scripts.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(function() {

        /*------------------------------------------
         --------------------------------------------
         Pass Header Token
         --------------------------------------------
         --------------------------------------------*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

     
    });
</script>
