<?php
function filterData($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>