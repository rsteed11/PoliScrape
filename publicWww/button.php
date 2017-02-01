<div class="row"  style="margin-bottom: 1em;">
      <div class="col-lg-10">
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
      </div>
</div>


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<?php return ''; ?>