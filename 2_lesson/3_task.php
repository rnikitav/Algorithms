<?php
//class MyClass {
//
//    protected $lines;
//    protected  $columns;
//    protected  $n = 1;
//    protected $res = [];
//
//    /**
//     * MyClass constructor.
//     * @param $lines
//     * @param $columns
//     */
//    public function __construct($columns, $lines)
//    {
//        $this->lines = $lines;
//        $this->columns = $columns;
//    }
//
//    public function render() {
//        $columns = $this->columns;
//        $lines = $this->lines;
//        $res = $this->res;
//        for ($i = 0; $i < $lines / 2; $i++){
//            for ($j = $i; $j < $lines - $i; $j++){
//                 $res[$i][$j] = $this->n;
//                 ++$this->n;
////                echo '<pre>' . $res
//            }
//        }
//        return $res;
//    }
//
//}
//
//$res = new MyClass(6, 6);
//var_dump ($res->render());
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script>
    const b =6;  // столбцы
    const m =6; // строки
    const n = b;
    let a = 1;
    if (b === 0 || m === 0){
        console.log('Error');

    }
    else {
        const matrix = Array.from({length: m}, () => Array(b).fill('x'));
        for (let i = 0; i < n / 2; i++){
            for (let j = i; j < m-i; j++){
                matrix[j][i] = String(a).padStart(2, '0');
                ++a;

            }
            for (let k = i + 1 ; k < b -i; k++ ){
                matrix[m - i - 1][k] = String(a).padStart(2, '0');
                ++a;
            }
            if (b === 1){
                break;
            }
            for (let y = m - i - 1; y >  i; y--){
                matrix[y  - 1][n- i -1] = String(a).padStart(2, '0');
                ++a;
            }
            for (let x = b - i - 1; x >  i + 1; x--){
                matrix[i][x - 1 ] = String(a).padStart(2, '0');
                ++a;
            }

        }
        console.log(matrix);
    }

</script>
</body>
</html>
