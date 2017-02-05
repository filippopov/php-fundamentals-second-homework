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
session_start();
$nameArr = [];
$agesArr = [];
if (! empty($_POST)) {
    $delimiter = isset($_POST['delimiter']) ? $_POST['delimiter'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $ages = isset($_POST['ages']) ? $_POST['ages'] : '';

    $nameArr = explode($delimiter, $name);
    $agesArr = explode($delimiter, $ages);
    $_SESSION['nameArr'] = $nameArr;
    $_SESSION['agesArr'] = $agesArr;
}
?>

<?php if (! empty($_SESSION['nameArr']) && ! empty($_SESSION['agesArr'])) : ?>
    <?php
        $nameArr = $_SESSION['nameArr'];
        $agesArr = $_SESSION['agesArr'];
        $minCount = min(count($nameArr), count($agesArr));
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $offset = $page * 5;
        $limit = ($page * 5) + 5;
        $limit = (($page * 5) + 5) > $minCount ? $minCount : ($page * 5) + 5;
        $pages = ceil($minCount / 5);
        $hasPrevious = $page > 0;
        $hasNext = $page < $pages - 1;
    ?>
    <?php
        function generatePage($page)
        {
            $request = $_SERVER['SCRIPT_NAME'];
            $url = $request . '?' . http_build_query(['page' => $page]);
            return $url;
        }
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
        <?php for ($i = $offset; $i < $limit; $i++) : ?>
            <tr>
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

    <div id="pagination">
        <?php if ($hasPrevious) :  ?>
            <a href="<?php echo generatePage($page - 1)?>">[Previous]</a>
        <?php endif; ?>
        <?php if ($hasNext) : ?>
            <a href="<?php echo generatePage($page + 1)?>">[Next]</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
