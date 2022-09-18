<html lang="ru">
<head>
    <title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <h1>веб-сервис Сортировка</h1>
    <?php
    
        //адрес проверки: http://localhost:8080/sort.php?arr=1,4,5,7,6,2,10
        //Быстрая сортировка
        function quickSort(array $arr) {
            $count= count($arr);
            if ($count <= 1) {
                return $arr;
            }
        
            $first_val = $arr[0];
            $left_arr = array();
            $right_arr = array();
        
            for ($i = 1; $i < $count; $i++) {
                if ($arr[$i] <= $first_val) {
                    $left_arr[] = $arr[$i];
                } else {
                    $right_arr[] = $arr[$i];
                }
            }
        
            $left_arr = quickSort($left_arr);
            $right_arr = quickSort($right_arr);
        
            return array_merge($left_arr, array($first_val), $right_arr);
        }

        $numbers = "";
        if(isset($_GET["arr"])){
            $numbers = $_GET["arr"];
        }

        $array = explode(",", $numbers);

        print_r(quickSort($array)); 
    ?>
</body>
</html>