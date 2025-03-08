<!-- MESSAGE DE SUCCESS -->
<?php if (isset($_GET['success']) &&
    $_GET['success']==1 &&
    isset($_GET['message']) &&
    isset($_GET['titre'])
    ): ?>
    <script>
        Swal.fire({
            timer: 3000,
            timeProgressBar: true,
            title: "<?=$_GET["titre"] ?>",
            text:  "<?=$_GET["message"] ?>",
            icon: "success"

        });
    </script>

<?php endif; ?>



<!-- MESSAGE DE ERROR -->
<?php if (isset($_GET['error']) &&
    $_GET['error']==1 &&
    isset($_GET['message']) &&
    isset($_GET['titre'])
    ): ?>
    <script>
        Swal.fire({
            timer: 3000,
            timeProgressBar: true,
            title: "<?=$_GET["titre"] ?>",
            text:  "<?=$_GET["message"] ?>",
            icon: "error"

        });
    </script>

<?php endif; ?>



