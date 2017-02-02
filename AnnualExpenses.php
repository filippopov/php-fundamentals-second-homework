<form method="post">
    <label for="years">Enter number of years: </label>
    <input type="text" name="years" id="years">
    <input type="submit" value="Show costs">
</form>

<?php if (! empty($_POST)) : ?>
    <?php
        $years = isset($_POST['years']) ? $_POST['years'] : 0;
        $total = 0;
        $startYear = 2016;
    ?>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th style="border: 1px solid black">
                    Year
                </th>
                <th style="border: 1px solid black">
                    January
                </th>
                <th style="border: 1px solid black">
                    February
                </th>
                <th style="border: 1px solid black">
                    March
                </th>
                <th style="border: 1px solid black">
                    April
                </th>
                <th style="border: 1px solid black">
                    May
                </th>
                <th style="border: 1px solid black">
                    June
                </th>
                <th style="border: 1px solid black">
                    July
                </th>
                <th style="border: 1px solid black">
                    August
                </th>
                <th style="border: 1px solid black">
                    September
                </th>
                <th style="border: 1px solid black">
                    October
                </th>
                <th style="border: 1px solid black">
                    November
                </th>
                <th style="border: 1px solid black">
                    December
                </th>
                <th style="border: 1px solid black">
                    Total
                </th>
            </tr>
        </thead>
    <tbody>
    <?php for ($i = 0; $i <= $years; $i++) : ?>
        <tr>
            <td style="border: 1px solid black">
                <?php echo $startYear - $i?>
            </td>
            <?php for ($j = 0; $j < 12; $j++) : ?>
                <?php
                    $monthExpenses = rand(0, 999);
                    $total += $monthExpenses;
                ?>
                <td style="border: 1px solid black">
                    <?php echo $monthExpenses?>
                </td>
            <?php endfor; ?>
            <td style="border: 1px solid black">
                <?php echo $total?>
            </td>
            <?php
                $total = 0;
            ?>
        </tr>
    <?php endfor; ?>
    </tbody>
    </table>
<?php endif; ?>
