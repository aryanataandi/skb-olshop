        </div>

        <footer class="sticky-footer bg-light">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Aryanata Andipradana 2020</span>
                </div>
            </div>
        </footer>

        </div>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apakah anda yakin ingin logout?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?= base_url('auth/logout_admin') ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('vendor/sb-admin-2/'); ?>js/sb-admin-2.min.js"></script>

        <!-- CKEditor5 -->
        <script src="<?= base_url('vendor/ckeditor5/ckeditor.js') ?>"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#deskripsi'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        <!-- Data Table -->
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "info": false,
                    "language": {
                        "lengthMenu": "Tampilkan _MENU_ data per halaman",
                        "zeroRecords": "<img src='<?= base_url('admin_assets/img/nodata.svg'); ?>' alt='nodata' class='d-flex mx-auto py-5' style='width: 200px;'><h3 class='text-center mb-5'>Data tidak ditemukan.</h3>",
                        "infoEmpty": "Data kosong",
                        "paginate": {
                            "previous": "&lsaquo;",
                            "next": "&rsaquo;"
                        }
                    }
                });
            });

            $(document).ready(function() {
                $('#dataTableInvoice').DataTable({
                    "order": [
                        [5, "desc"]
                    ],
                    "info": false,
                    "language": {
                        "lengthMenu": "Tampilkan _MENU_ data per halaman",
                        "zeroRecords": "<img src='<?= base_url('admin_assets/img/nodata.svg'); ?>' alt='nodata' class='d-flex mx-auto py-5' style='width: 200px;'><h3 class='text-center mb-5'>Data tidak ditemukan.</h3>",
                        "infoEmpty": "Data kosong",
                        "paginate": {
                            "previous": "&lsaquo;",
                            "next": "&rsaquo;"
                        }
                    }
                });
            });
        </script>

        <!-- My Javascript -->
        <script>
            window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        </script>

        </body>

        </html>