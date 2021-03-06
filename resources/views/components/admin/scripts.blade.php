<!-- jQuery -->
<script src="{{ asset('assets-admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets-admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets-admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('assets-admin/vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets-admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets-admin/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets-admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets-admin/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('assets-admin/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('assets-admin/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('assets-admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('assets-admin/vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets-admin/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets-admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
</script>
<script src="{{ asset('assets-admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets-admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<!-- validator -->
<script src="{{ asset('assets-admin/vendors/validator/validator.js') }}"></script>

<!-- Switchery -->
<script src="{{ asset('assets-admin/vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets-admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('assets-admin/build/js/custom.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

<script src="{{ asset('assets-admin/vendors/summernote/summernote-lite.min.js') }}"></script>


<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
    // Ini adalah Convert dari File ke Base 64
    const fileToBase64 = async (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader()
            reader.readAsDataURL(file)
            reader.onload = () => resolve(reader.result)
            reader.onerror = (e) => reject(e)
        })
    }
    // Upload Image Summernote
    function uploadImage(base64) {
        data = {
            'base64': base64
        }
        $.ajax({
            data: data,
            type: "POST",
            url: "#",
            cache: false,
            success: filename => {
                // console.log(filename)
                // BASE_URL + 'uploads/summernotes/' + filename
                @if ($app->environment('local'))
                    const img = '<img class="img-fluid" src="/uploads/summernotes/' + filename +
                                        '" alt="">'
                @else
                    const img = '<img class="img-fluid" src="/public/uploads/summernotes/' + filename +
                                            '" alt="">'
                @endif
                $('#summernote').summernote('editor.pasteHTML', img);
            }
        });
    }

    // Scripts Full Screen
    function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    }
</script>
