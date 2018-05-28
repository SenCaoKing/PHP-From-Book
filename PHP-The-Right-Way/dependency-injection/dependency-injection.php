<?php
namespace Database;

// 依赖注入是一种允许我们从硬编码的依赖中解耦出来，从而在运行时或者编译时能够修改的软件设计模式。

// 下面的代码中有一个 Database 的类，它需要一个适配器来与数据库交互。我们在构造函数里实例化了适配器，从而产生了耦合。这会使测试变得很困难，而且 Database 类和适配器耦合的很紧密。
//class Databse
//{
//    protected $adapter;
//
//    public function __construct()
//    {
//        $this->adapter = new MysqlAdapter;
//    }
//}
//
//class MysqlAdapter {}


// 上面的代码可以用依赖注入重构，从而解耦
//class Database
//{
//    protected  $adapter;
//
//    public function __construct(MysqlAdapter $adapter)
//    {
//        $this->adapter = $adapter;
//    }
//}
//
//class MysqlAdapter {}


// 依赖反转准则
// 依赖反转准则是面向对象设计准则 S.O.L.I.D 中的 “D” ,倡导 “依赖于抽象而不是具体”。简单来说就是依赖应该是接口/约定或者抽象类，而不是具体的实现。我们能很容易重构前面的例子，使之遵循这个准则
class Database
{
    protected  $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}

interface AdapterInterface {}

class MysqlAdapter implements AdapterInterface {}

?>