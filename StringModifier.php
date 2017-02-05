

<form method="post">
    <label for="input">Enter String</label>
    <input type="text" id="input" name="input">
    <input type="radio" name="command" value="palindrome">
    Check Palindrome
    <input type="radio" name="command" value="reverseString">
    Reverse String
    <input type="radio" name="command" value="split">
    Split
    <input type="radio" name="command" value="hashString">
    Hash String
    <input type="radio" name="command" value="shuffleString">
    Shuffle String
    <input type="submit">
</form>

<?php
    if (! empty($_POST)) {
        $input = isset($_POST['input']) ? $_POST['input'] : '';
        $command = isset($_POST['command']) ? $_POST['command'] : '';
        $result = '';
        switch ($command) {
            case 'palindrome' :
                $result = palindrome($input);
                break;
            case 'reverseString' :
                $result = reverseString($input);
                break;
            case 'split' :
                $result = split($input);
                break;
            case 'hashString' :
                $result = hashString($input);
                break;
            case 'shuffleString' :
                $result = shuffleString($input);
                break;
            default :
                $result =  'Please set valid command';
                break;
        }

        echo $result;
    }

    function palindrome($input)
    {
        $inputToLower = strtolower($input);
        $reverseInput = strrev($inputToLower);

        if ($inputToLower === $reverseInput) {
            $result = "$input is a palindrome!";
        } else {
            $result = "$input is not a palindrome!";
        }

        return $result;
    }

    function reverseString($input)
    {
        return strrev($input);
    }

    function split($input)
    {
        $inputArr = explode(' ', $input);
        $result = [];
        foreach ($inputArr as $data) {
            for ($i = 0; $i < strlen($data); $i++) {
                $result[] = $data[$i];
            }
        }

        return implode(' ', $result);
    }

    function hashString($input)
    {
        return md5($input);
    }

    function shuffleString($input)
    {
        return str_shuffle($input);
    }
?>