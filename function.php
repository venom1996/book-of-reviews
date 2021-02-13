<?php
function clearDate($var) {
global $dbz;
    $var = trim(mysqli_real_escape_string($dbz,$var));
    return $var;
}

function encryption($var) {
    $var = htmlspecialchars($var);
    return $var;
}

function addPost($name, $desc)      //Добавление сообщения
{
    global $dbz;

    $name = clearDate($name);
    $desc = clearDate($desc);

    if (empty($name)) $name = 'Аноним';

    if (!empty($desc)) {
        $sql = "INSERT INTO post (name, description) 
            VALUES ('$name', '$desc')";
        $dbz->query($sql);
        if (mysqli_affected_rows($dbz) > 0) {
            $res = '<div class="info alert alert-info">
				Запись успешно сохранена!
			</div>';
        } else {

            $res = 'Ошибка!, обратитесь к администратору';
        }
    }else {
       $res = false;
    }
    return $res;
}

function SelectComent() {
    global $dbz;
 $post = array();
    $sql = "SELECT  name, description, date FROM post";
   $results = $dbz->query($sql);

   while ($rows = mysqli_fetch_assoc($results)){
       $post[] = $rows;
   }
return $post;
}


?>