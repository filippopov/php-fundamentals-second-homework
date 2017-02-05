<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>
        .btn-primary {
            color: white;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<form method="post">
    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Exam Score</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <a class="btn btn-primary" id="button-add">+</a>
    Sort By:
    <select name="sortBy">
        <option value="firstName">First Name</option>
        <option value="secondName">Second Name</option>
        <option value="email">Email</option>
        <option value="examScore">Exam Score</option>
    </select>
    Order:
    <select name="order">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>
    <input type="submit">
</form>


<?php if (! empty($_POST)) : ?>
    <?php
        $sum = 0;
        $counter = 0;
        $tableInfo = [];
        $order = isset($_POST['order']) ? $_POST['order'] : '';
        $sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : '';
        unset($_POST['order']);
        unset($_POST['sortBy']);
        foreach ($_POST as $key => $info){
            $keyData = explode('_', $key);
            $tableInfo[$keyData[1]][$keyData[0]] = $info;
        }

        foreach ($tableInfo as $key => $value) {
            $tableInfo[$value[$sortBy]] = $value;
            $sum += $value['examScore'];
            $counter++;
            unset($tableInfo[$key]);
        }

        $average = $sum / $counter;

        if ($order == 'asc') {
            ksort($tableInfo);
        } else {
            krsort($tableInfo);
        }
    ?>

    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Exam Score</th>
        </tr>
        </thead>
        <tbody>

    <?php foreach ($tableInfo as $row) : ?>
        <tr>
            <td><?php echo $row['firstName']?></td>
            <td><?php echo $row['secondName']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['examScore']?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td><?php echo "Average score: "?></td>
        <td></td>
        <td></td>
        <td><?php echo (int) $average?></td>
    </tr>
        </tbody>
    </table>
<?php endif; ?>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script>
    function removeRow(data) {
        $('#row' + data.attr('id')).remove()
    }
    $(function () {
        var counter = 0;
        $('#button-add').click(function () {
            counter++;
            $('form table tbody').append('<tr id="row' + counter + '"><th><input type="text" name="firstName_' + counter +'"></th><td><input type="text" name="secondName_' + counter +'"></td><td><input type="text" name="email_' + counter +'"></td><td><input name="examScore_' + counter +'" type="number"><a class="btn btn-primary" onclick="removeRow($(this))" id="' + counter +'">-</a></td></tr>');
        });
    })
</script>
</body>
</html>