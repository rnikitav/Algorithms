<?php
function run()
{
    $path = '/';
    $arrDir = [];
    $arrFile = [];
    $arrAll = [];
    if (!empty($_GET['back'])){
        $_SERVER['PATH_INFO'] = preg_replace('/\/\w+$/i', "", $_SERVER['PATH_INFO']);
        unset($_GET['back']);
        $_SERVER['REQUEST_URI'] = preg_replace('/\?back=true/i', "", $_SERVER['REQUEST_URI']);
        $redirect = preg_replace('/\/\w+$/i', "", $_SERVER['HTTP_REFERER']);
        header("Location: "  . $redirect);
        exit();
    }
    if (!empty($_SERVER['PATH_INFO'])){
        $path = $_SERVER['PATH_INFO'];
    }

    $dir = new DirectoryIterator($path);
    foreach ($dir as $item) {
        if ($item->isDir()) {
            if ($item->getFilename() == '.' or $item->getFilename() == '..') {
                continue;
            }
            array_push($arrDir, $item->getFilename());
        } else {
            array_push($arrFile, $item->getFilename());
        }
    }
    $arrAll = ['dir' => $arrDir, 'file' => $arrFile];
    return $arrAll;
}

function filter($res)
{
    $arrToLower = array_map('strtolower', $res);
    array_multisort($arrToLower, SORT_ASC, SORT_STRING, $res);
    return $res;
}

function showOnPage($arr, $type)
{
    $path = $_SERVER['REQUEST_URI'];
    if ($type == 'dir') {
        foreach ($arr as $dir) {
            echo "<a href='{$path}/{$dir}'>" . $dir . '</a>' . '<br>';
        }
        echo '<hr>';
        return;
    }
    foreach ($arr as $file) {
        echo '<p>' . $file . '</p>';
    }
}

$res = run();
$resFilterDir = filter($res['dir']);
$resFilterFile = filter($res['file']);
showOnPage($resFilterDir, 'dir');
showOnPage($resFilterFile, 'file');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (!empty($_SERVER['PATH_INFO'])): ?>
<a href="?back=true">Назад</a>
<?php endif ?>
</body>
</html>
