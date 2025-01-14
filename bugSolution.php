```php
function processArray(array $arr): array {
    // Solution 1: Iterating backward
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        if (is_array($arr[$i])) {
            $arr[$i] = processArray($arr[$i]);
        } else if ($arr[$i] === 'remove') {
            unset($arr[$i]);
        }
    }
    return $arr;
}

//Alternative Solution using array_filter
function processArrayFilter(array $arr): array {
  $arr = array_filter($arr, function ($item) {
    if (is_array($item)){
        return count(array_filter($item, function($item){return $item !== 'remove';}));
    } else return $item !== 'remove';
  });
  return $arr;
}

$myArray = [
  'a' => 1,
  'b' => [
    'c' => 2,
    'd' => 'remove',
    'e' => 3,
  ],
  'f' => 4,
];

$processedArray = processArray($myArray);
print_r($processedArray);
echo '\n';
$processedArray = processArrayFilter($myArray);
print_r($processedArray);
```