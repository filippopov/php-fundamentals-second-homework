<form method="post">
    <div>
        Delimiter:
        <select name="delimiter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </div>
    <div>
        Name:
        <input name="name" type="text">
    </div>
    <div>
        Ages:
        <input name="ages" type="text">
    </div>
    <div>
        <input type="submit" value="Filter!">
    </div>
</form>

<?php
    $nameArr = [];
    $agesArr = [];
    if (! empty($_POST)) {
        $delimiter = isset($_POST['delimiter']) ? $_POST['delimiter'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $ages = isset($_POST['ages']) ? $_POST['ages'] : '';

        $nameArr = explode($delimiter, $name);
        $agesArr = explode($delimiter, $ages);
    }
?>

<?php if (! empty($nameArr) && ! empty($agesArr)) : ?>
    <?php
        $minCount = min(count($nameArr), count($agesArr));
    ?>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th style="border: 1px solid black">
                    Name
                </th>
                <th style="border: 1px solid black">
                   Age
                </th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < $minCount; $i++) : ?>
                <tr style="border: 1px solid black">
                    <td style="border: 1px solid black">
                        <?php echo $nameArr[$i] ?>
                    </td>
                    <td style="border: 1px solid black">
                        <?php echo $agesArr[$i] ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<?php endif; ?>
