# Algorithms
### Урок 1. PHP SPL. Массивы и структуры данных
1. Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack.
   Примеры:
   - "Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: 
   - {[][()]}" - true
   - ((a + b)/ c) - 2 - true
   - "([ошибка)" - false
   - "(") - false
   
2. Простые делители числа 13195 - это 5, 7, 13 и 29. Каков самый большой делитель числа 600851475143, являющийся простым числом? Проверить ответ можно здесь(нужна регистрация)
3. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.
### Урок 2. Алгоритмические задачи в web-программировании
1.  Определить сложность следующих алгоритмов:
   - Поиск элемента массива с известным индексом
   - Дублирование одномерного массива через foreach
   - Рекурсивная функция нахождения факториала числа
   - Удаление элемента массива с известным индексом

2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?


- $n = 10000;
- $array[]= [];

 - for ($i = 0; $i < $n; $i++) {
 -   for ($j = 1; $j < $n; $j *= 2) {
       $array[$i][$j]= true;
 } }
 - 

- $n = 10000;
 - $array[] = [];

- for ($i = 0; $i < $n; $i += 2) {
 -  for ($j = $i; $j < $n; $j++) {
  -  $array[$i][$j]= true;
   } }
   
   
3.Требуется написать метод, принимающий на вход размеры двумерного массива и выводящий массив в виде инкременированной цепочки чисел, идущих по спирали против часовой стрелки.
Примеры:
- 2х3
 - 1 6
- 2 5
- 3 4

- 3х1
- 1 2 3
- 4х4
- 01 12 11 10
- 02 13 16 09
- 03 14 15 08
- 04 05 06 07

- 0х7
- Ошибка!

4.Выписав первые шесть простых чисел, получим 2, 3, 5, 7, 11 и 13. Очевидно, что 6-ое простое число - 13.
  
  Какое число является 10001-ым простым числом?

### Урок 3 .  Рекурсия

1. Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1). Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
   Примеры:
   - [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
   - [1, 2, 4, 5, 6] => 3
   - [] => 1

2. Рассмотреть структуры данных Nested Sets и Clojure table

3. Доработать алгоритм бинарного поиска для нахождения кол-ва повторений в массиве. Сложность O(logn) не должна измениться. Учтите, что массив длиной n может состоять из одного значения [4, 4, 4, 4, ...(n)..., 4]

4. Реализовать на РНР сортировку слиянием
