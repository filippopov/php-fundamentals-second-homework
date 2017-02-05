<form method="post">
    <label for="starting-index">Starting Index</label>
    <input type="number" name="startingIndex" id="starting-index">
    <label for="end-index">End</label>
    <input type="number" name="endIndex" id="end-index">
    <input type="submit">
</form>

<?php
if (! empty($_POST)) {
    $startingIndex = isset($_POST['startingIndex']) ? $_POST['startingIndex'] : 0;
    $endIndex = isset($_POST['endIndex']) ? $_POST['endIndex'] : 0;

    for ($i = $startingIndex; $i <= $endIndex; $i++) {
        $color = isPrime($i) ? 'font-weight: bold' : '';

        echo "<span style=\"{$color}\">$i </span>";
    }
}

function isPrime($num)
{
    if ($num == 1) {
        return false;
    }

    if ($num == 2) {
        return true;
    }

    if ($num % 2 == 0) {
        return false;
    }

    $ceil = ceil(sqrt($num));
    for($i = 3; $i <= $ceil; $i+=2) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
?>