<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 24/03/2018
 * Time: 23:16
 */

$filePath = implode('/', $controller->filePath);
set_include_path($_SERVER['DOCUMENT_ROOT']);
error_reporting(E_ERROR);

require 'head.php';
?>
<!DOCTYPE html>
<html>
<body>
    <?php require 'header.php'; ?>
    <div class="content">
        <?php require "$filePath.php"; ?>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>