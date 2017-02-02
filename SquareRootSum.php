<?php
$squareRootSum = 0;
$square = 0;
?>

<table style="border: 1px solid black">
    <thead>
        <tr>
            <th style="border: 1px solid black">
                Number
            </th>
            <th style="border: 1px solid black">
                Square
            </th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i <= 100; $i+=2) : ?>
            <?php
                $square = round(sqrt($i), 2);
                $squareRootSum += $square;
            ?>
            <tr>
                <td style="border: 1px solid black">
                    <?php echo $i?>
                </td>
                <td style="border: 1px solid black">
                    <?php echo $square?>
                </td>
            </tr>
        <?php endfor; ?>
        <tr>
            <th style="border: 1px solid black">
                Total:
            </th>
            <td style="border: 1px solid black">
                <?php echo $squareRootSum?>
            </td>
        </tr>
    </tbody>
</table>