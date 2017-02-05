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
    <div>
        <input type="submit" value="Calculate!">
    </div>
</form>

<?php
if (! empty($_POST)) {
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
    $numberOne = isset($_POST['numberOne']) ? $_POST['numberOne'] : 0;
    $numberTwo = isset($_POST['numberTwo']) ? $_POST['numberTwo'] : 0;

    if ($operation == 'sum') {
        echo ' == ' . ($numberOne + $numberTwo);
    } else if ($operation == 'subtract') {
        echo ' == ' . ($numberOne - $numberTwo);
    } else {
        echo ' == Wrong operation supplied';
    }
}
?>