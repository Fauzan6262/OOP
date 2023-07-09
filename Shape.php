<?php
// Abstract class Shape
abstract class Shape {
    abstract public function getArea();
}

// Class Circle yang mewarisi Shape
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * $this->radius * $this->radius;
    }
}

// Class Rectangle yang mewarisi Shape
class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}

// Class Square yang mewarisi Rectangle
class Square extends Rectangle {
    public function __construct($side) {
        parent::__construct($side, $side);
    }
}

// Fungsi untuk menyimpan data ke file
function saveShapesToFile($filename, $shapes) {
    $data = serialize($shapes);
    file_put_contents($filename, $data);
}

// Fungsi untuk membaca data dari file
function readShapesFromFile($filename) {
    $data = file_get_contents($filename);
    $shapes = unserialize($data);
    return $shapes;
}

// Membuat objek-objek shape
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$square = new Square(3);

// Menyimpan objek-objek shape ke dalam file
saveShapesToFile('shapes.txt', [$circle, $rectangle, $square]);

// Membaca objek-objek shape dari file
$shapes = readShapesFromFile('shapes.txt');

// Menggunakan objek-objek shape
foreach ($shapes as $shape) {
    echo get_class($shape) . " - Area: " . $shape->getArea() . "<br>";
}
