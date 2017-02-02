<form method="post">
    <label for="cars">Enter cars</label>
    <input type="text" name="cars" id="cars">
    <input type="submit" value="Show result">
</form>

<?php
$carColors = [
    'white',
    'black',
    'green',
    'blue',
    'pink'
];
?>

<?php if (! empty($_POST)) : ?>
<?php
    $cars = isset($_POST['cars']) ? $_POST['cars'] : '';
    $carsArray = explode(', ', $cars);
?>
    <table style="border: 1px solid black">
    <thead>
        <tr>
            <th style="border: 1px solid black">
                Car
            </th>
            <th style="border: 1px solid black">
                Color
            </th>
            <th style="border: 1px solid black">
                Count
            </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($carsArray as $car) : ?>
        <?php
            $quantity = rand(1, 5);
            $colorNumber = rand(0, count($carColors) - 1);
            $color = isset($carColors[$colorNumber]) ? $carColors[$colorNumber] : '';
        ?>
        <tr>
            <td style="border: 1px solid black">
                <?php echo $car?>
            </td>
            <td style="border: 1px solid black">
                <?php echo $color?>
            </td>
            <td style="border: 1px solid black">
                <?php echo $quantity?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
<?php endif; ?>