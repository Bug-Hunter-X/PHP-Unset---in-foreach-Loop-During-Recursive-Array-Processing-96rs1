```php
function processArray(array $arr): array {
  foreach ($arr as $key => $value) {
    if (is_array($value)) {
      $arr[$key] = processArray($value); // Recursive call
    } else if ($value === 'remove') {
      unset($arr[$key]); // Remove element
    }
  }
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
```