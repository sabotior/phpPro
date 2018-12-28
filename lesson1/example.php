<?
//5. Дан код:
//Что он выведет на каждом шаге? Почему?

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();//Ничего, просто создали объект
$a2 = new A();//Ничего, просто создали объект
$a1->foo();//1 
$a2->foo();//2
$a1->foo();//3
$a2->foo();//4


//Немного изменим п.5:
//6. Объясните результаты в этом случае.
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {//переменная $x в каждом классе будет своя
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2


//7. *Дан код:
//Что он выведет на каждом шаге? Почему?

//////Ответ: Тоже самое, что и в 6 задаче. (нет конструктора)

/*
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
*/

