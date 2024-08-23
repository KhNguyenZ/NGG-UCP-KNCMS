</div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://www.facebook.com/Gtasampvietnam2023"><?= $knsite['Copyright'] ?></a> 2023</span>
            <br>
            <span>Founder & Owner <?= $knsite['Owner'] ?></span>
        </div>
    </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="<?= $base_url ?>lib/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= $base_url ?>lib/js/sb-admin-2.min.js"></script>
<script src="<?= $base_url ?>lib/vendor/jquery/jquery.min.js"></script>
<script src="<?= $base_url ?>lib/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>lib/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= $base_url ?>lib/js/sb-admin-2.min.js"></script>
<script src="<?= $base_url ?>lib/vendor/chart.js/Chart.min.js"></script>
<script src="<?= $base_url ?>lib/js/demo/chart-area-demo.js"></script>
<script src="<?= $base_url ?>lib/js/demo/chart-pie-demo.js"></script>
<script src="<?= $base_url ?>lib/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>lib/vendor/datatables/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>

    $(document).ready(function() {
    $('#basic-datatables').DataTable({
        "order": [[ 2, "desc" ]]
    });
});
</script>
</body>

</html>