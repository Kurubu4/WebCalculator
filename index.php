<?php
    $answer = '';
    if (isset($_GET['submit'])) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $operator = $_GET['operator'];
        
        $errors = array();
        if ($num1 === "") {
            $errors['num1'] = "number1 is not entered";
        }
        if ($num2 === "") {
            $errors['num2'] = "number2 is not entered";
        }
        if ($num1 === 0 && $operator === "/") {
            $errors['zerodivide'] = "0 divide";
        }

        if (empty($errors)) {
            switch ($operator) {
                case "+":
                    $answer = $num1 + $num2;
                break;
                case "-":
                    $answer = $num1 - $num2;
                break;
                case "*":
                    $answer = $num1 * $num2;
                break;
                case "/":
                    $answer = $num1 / $num2;
                break;
            };
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <?php
        if (!empty($errors)) {
            echo "<ul>";
            foreach($errors as $message) {
                echo "<li>";
                echo $message;
                echo "</li>";
            }
            echo "</ul>";
        }
    ?>
    <form>
        <input type="text" name="num1" value="<?php if(!empty($num1)) {echo $num1;} ?>" placeholder="Number 1">
        <input type="text" name="num2" value="<?php if(!empty($num2)) {echo $num2;} ?>" placeholder="Number 2">
        <select name="operator">
            <?php
                $operators = ['+', '-', '*', '/'];
                foreach($operators as $_operator) {
                    $op_select_flg = 0;
                    if (!empty($operator)) {
                        if ($operator == $_operator) {
                            $op_select_flg = 1;
                        }
                    }
                    if ($op_select_flg) {
                        echo "<option selected>" . $_operator . "</option>";
                    } else {
                        echo "<option>" . $_operator . "</option>";
                    }
                }
            ?>
            </option>
        </select>
        <button type="submit" name="submit" value="submit">Calculate</button>
    </form>
    <?php 
        echo "<h2>The Answer is :" . $answer . "</h2>";
    ?>
</body>
</html>