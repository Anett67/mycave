

<footer>

    <?php if(isset($_SESSION['id'])): ?>
        <a class="col-10 col-lg-2" href="<?php echo SITE_URL."request/disconnect.php" ?>">Log Out</a>
    <?php else: ?>
        <a class="col-10 col-lg-2" href= "<?php echo SITE_URL."php/admin.php" ?>" >Admin Page</a>
    <?php endif; ?>

</footer>


<script type="text/javascript" src="<?php echo SITE_URL."assets/libs/jquery/jquery-3.4.1.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo SITE_URL."assets/js/src/scripts.js" ?>"></script>

</body>
</html>