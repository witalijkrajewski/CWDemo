<?php

function checkOloInFullName($fullname) {
    return strpos($fullname, "оло") !== false;
}

function countDaysUntilTheBirthday($birthdayDate) {
    $birthdayToTime = strtotime($birthdayDate);
    $birthdayDay = date("j", $birthdayToTime);
    $birthdayMonth = date("n", $birthdayToTime);

    $today = time();

    $nextBirthdayDate = mktime(0, 0, 0, $birthdayMonth, $birthdayDay, date("Y", $today));
    return floor(($nextBirthdayDate - $today) / 86400);
}

function isUserGetDiscount($daysUntilBirthday) {
    return ($daysUntilBirthday <= 30) ? "10%" : "";
}

function createOutputForDiscount($discount) {
    return ($discount) ? "Сообщаем Вам о получении скидки $discount<br> к следующему заказу!" : "К сожалению Вам скидка не пологается.";
}

function createOutputForGifts($giftsArray) {
    $giftsToOutput = "";

    for ($index = 0; $index < count($giftsArray); $index += 1) {
        $gift = $giftsArray[$index];
        $giftsToOutput = $giftsToOutput . "<li>$gift</li>";
    }

    return $giftsToOutput;

}

function createTable($discount, $giftsArray, $fullName) {
    $table_header = "<tr><th colspan='2'>Уважаемый $fullName!<br>Ваш заказ принят!</th></tr>";

    $table_content = "<tr><td>Спасибо, что Вы с нами! К вашему<br>
заказу будут добавлены<br>
комплименты от организации в виде:<ul>" . createOutputForGifts($giftsArray) . "</ul></td>";

    $table_content .= "<td>" . createOutputForDiscount($discount) . "</td></tr>";

    return "<table>$table_header$table_content</table>";
}

echo "<link rel='stylesheet' href='styles.css'>";

$fullNameFromRequest = $_POST["fullname"];
$birthdayFromRequest = $_POST["birthday"];
$deliveryFromRequest = $_POST["delivery"];

if (isset($_POST["gifts"])) {
    $giftsFromRequest = $_POST["gifts"];
}

if (checkOloInFullName($fullNameFromRequest)) {
    array_push($giftsFromRequest, "Часы");
}

$daysUntilTheBirthday = countDaysUntilTheBirthday($birthdayFromRequest);
$discount = isUserGetDiscount($daysUntilTheBirthday);

echo createTable($discount, $giftsFromRequest, $fullNameFromRequest);


