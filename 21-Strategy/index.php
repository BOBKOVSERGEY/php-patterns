<?php
namespace Strategy;
interface SortStrategy
{
    public function sort(array $dataset): array;
}

class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Sorting using bubble sort";

        // Do sorting
        return $dataset;
    }
}

class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Sorting using quick sort";

        // Do sorting
        return $dataset;
    }
}

class Sorter
{
    public function __construct(
        protected SortStrategy $sorterSmall,
        protected SortStrategy $sorterBig,
    )
    {}

    public function sort(array $dataset): array
    {
        if (count($dataset) > 5) {
            return $this->sorterBig->sort($dataset);
        } else {
            return $this->sorterSmall->sort($dataset);
        }
    }
}

$smallDataset = [1, 3, 4, 2];
$bigDataset = [1, 4, 3, 2, 8, 10, 5, 6, 9, 7];

$sorter = new Sorter(new BubbleSortStrategy(), new QuickSortStrategy());

$sorter->sort($smallDataset); // Output : Sorting using bubble sort

$sorter->sort($bigDataset); // Output : Sorting using quick sort