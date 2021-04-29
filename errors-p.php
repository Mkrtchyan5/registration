<?php if (count($errors_p) > 0): ?>
    <div class="error">
        <?php foreach ($errors_p as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>