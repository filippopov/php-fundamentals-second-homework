<form method="post">
    <label for="input">Input String</label>
    <input type="text" name="input" id="input">
    <input type="submit">
</form>


<?php if (! empty($_POST)) : ?>
    <?php
        $input = isset($_POST['input']) ? $_POST['input'] : '';
        $inputArr = explode(', ', $input);
        $sum = 0;
    ?>
    <table style="border: 1px solid black">
        <thead>
        </thead>
        <tbody>
    <?php foreach ($inputArr as $data) : ?>
        <?php for ($i = 0; $i < strlen($data); $i++) : ?>
            <?php
                if (is_numeric($data[$i])) {
                    $sum += $data[$i];
                } else {
                    $sum = 'I cannot sum that';
                    break;
                }
            ?>
        <?php endfor; ?>
        <tr>
            <td style="border: 1px solid black">
                <?php echo $data; ?>
            </td>
            <td style="border: 1px solid black">
                <?php echo $sum; ?>
            </td>
        </tr>
        <?php
            $sum = 0;
        ?>
    <?php endforeach;?>
        </tbody>
    </table>
<?php endif; ?>

