<?php

/**
 * Sorts an array in ascending order
 * Returns a new sorted list
 *
 * Steps:
 * - Divide: Find the midpoint of a list and divide into sublists
 * - Conquer: Recursively sort the sublists created in the previous step
 * - Combine: Merge the sorted sublists created in the previous step
 * Take O(n log n) time
 */
function mergeSort(array $list): array
{
    // stopping condition
    if (count($list) <= 1) {
        return $list;
    }

    [$lefHalf, $rightHalf] = divide($list);
    $left = mergeSort($lefHalf);
    $right = mergeSort($rightHalf);

    return merge($left, $right);
}

/**
 * Divide a list at midpoint into sublist
 * Returns two sublist - left and right
 * Takes O(log n) time (there is a caveat here. In fact the slice function takes O(k) time.
 * So we could say that the merge function takes O(k log n) time)
 */
function divide(array $list): array
{
    $count = count($list);
    $mid = (int) floor($count / 2.0);
    $left = array_slice($list, 0, $mid);
    $right = array_slice($list, $mid);

    return [$left, $right];
}

/**
 * Merges two arrays, sorting them in the process
 * Returns a new merged array
 * Takes O(n) time
 */
function merge(array $left, array $right): array
{
    $i = 0;
    $j = 0;
    $list = [];

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $list[] = $left[$i];
            $i++;
        } else {
            $list[] = $right[$j];
            $j++;
        }
    }

    while ($i < count($left)) {
        $list[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $list[] = $right[$j];
        $j++;
    }

    return $list;
}

function verifySorted(array $list): bool
{
    if (count($list) <= 1) {
        return true;
    }

    return $list[0] <= $list[1] && verifySorted(array_slice($list, 2));
}
