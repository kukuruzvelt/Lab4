<?php

class Parent_class
{
    public string $string1;
    public $string2;
    public $num;

    function __construct(string $s1, string $s2, int $n = 0)
    {
        $this->string1 = $s1;
        $this->string2 = $s2;
        $this->num = $n;
    }

}

class Child_class extends Parent_class
{
    private static $instances = [];
    public $mas;

    protected function __construct(string $s1, string $s2, int $n, $m)
    {
        parent::__construct($s1, $s2, $n);
        $this->mas = $m;

    }

    public static function getInstance(string $s1, string $s2, int $n = 0, $m = []): Child_class
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($s1, $s2, $n, $m);
        }

        return self::$instances[$cls];
    }

    function add_to_mas($key, $value)
    {
        $this->mas[$key] = $value;
    }


}

$class = Child_class::getInstance("a", "b");
$class->add_to_mas("key", "value");
$class->add_to_mas("key1", "value1");
$class->add_to_mas("key2", "value2");
echo "first class ".$class->string1.", ".$class->string2.", ".implode(", ", array_values($class->mas));
$class1 = Child_class::getInstance("c", "d");
echo "<p>second class ".$class1->string1.", ".$class1->string2.", ".implode(", ", array_values($class1->mas));

