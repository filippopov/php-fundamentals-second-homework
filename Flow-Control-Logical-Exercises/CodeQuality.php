<?php
if (! empty($_POST)) {
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
    $numberOne = isset($_POST['numberOne']) ? $_POST['numberOne'] : 0;
    $numberTwo = isset($_POST['numberTwo']) ? $_POST['numberTwo'] : 0;
    $output = '';
    if ($operation == 'sum') {
        $output = $numberOne + $numberTwo;
    } else if ($operation == 'subtract') {
        $output = $numberOne - $numberTwo;
    } else {
        $output = 'Wrong operation supplied';
    }
}
?>

<form method="post">
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        Number 1:
        <input name="numberOne" type="number">
    </div>
    <div>
        Number 2:
        <input name="numberTwo" type="number">
    </div>
    <?php if (isset($output)) : ?>
        <div>
            Result:
            <input disabled="disabled" type="text" value="<?php echo $output ?>">
        </div>
    <?php endif; ?>
    <div>
        <input type="submit" value="Calculate!">
    </div>
</form>

