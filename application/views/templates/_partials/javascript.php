<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.world.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment-with-locales.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<!-- CKEditor -->
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
<!-- CKFinder -->
<script src="<?= base_url('assets/plugins/ckfinder/ckfinder.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>
<!-- Custom Scripts -->
<script src="<?= base_url('assets/dist/js/alert.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/table.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/ckeditor.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/modal.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/tanggal.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/chart.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.menu tbody').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-position') != (index + 1)) {
                        $(this).attr('data-position', (index + 1)).addClass('updated');
                    }
                });
                saveNewPositions();
            }
        });
    });

    function saveNewPositions() {
        var positions = [];
        $('.updated').each(function() {
            positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            $(this).removeClass('updated');
        });
        $.ajax({
            url: 'halaman/updatePosisi',
            method: 'POST',
            dataType: 'text',
            data: {
                update: 1,
                posisi: positions
            },
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>