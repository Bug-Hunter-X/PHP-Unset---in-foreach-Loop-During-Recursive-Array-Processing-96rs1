# PHP Unset() in foreach Loop During Recursive Array Processing

This repository demonstrates a subtle bug in PHP related to using `unset()` within a `foreach` loop that iterates over the same array being modified. The issue becomes apparent when the code involves recursive array processing.

## The Bug

The `processArray` function aims to recursively traverse an array, removing elements with the value 'remove'.  However, the use of `unset()` within the `foreach` loop can lead to unexpected behavior and skipped elements due to the internal array pointer's movement after removing elements.

## How to Reproduce

1. Clone this repository.
2. Run `bug.php`. Observe the output. The element with key 'e' might be missing.

## The Solution

The `bugSolution.php` file provides a corrected version using a `for` loop and iterating backwards or utilizing the `array_filter` function for cleaner element removal within the array. This prevents issues related to the internal array pointer during modification.

## Lessons Learned

This example highlights the importance of understanding how PHP's internal array handling works, especially when modifying an array while iterating over it.  Always be mindful of how pointer changes might impact your logic, and consider safer alternatives when appropriate, like `array_filter` or iterating backward with a `for` loop.