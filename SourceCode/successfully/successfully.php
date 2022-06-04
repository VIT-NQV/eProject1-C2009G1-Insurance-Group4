<?php if(isset($_SESSION['update']) || isset($_SESSION['delete'])): ?>
<br><br><br>
<div class="alert alert-success" style="text-align:center;">
    <h2 class="successfully">
        <?php 
            echo isset($_SESSION['update'])? $_SESSION['update'] : ''; 
            echo isset($_SESSION['delete'])? $_SESSION['delete'] : '';   
            unset($_SESSION['update']);
            unset($_SESSION['delete']);
        ?>
    </h2>
</div>
<?php endif; ?>
