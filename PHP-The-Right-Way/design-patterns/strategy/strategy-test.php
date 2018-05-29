<?php
/**
 * Created by Sublime
 * User: SenCaoKing
 * Date: 2018/04/04
 * Time: 10:00(待测试)
 */

/**
 * PHP策略模式(参考:https://blog.csdn.net/qq_25504271/article/details/74277851)
 * 引导1：什么是策略模式？ 策略模式顾名思义就是针对一个业务有不同的策略，可以根据使用环境，选择不同的算法进行业务处理。
 * 引导2：应用案例：商城根据不同级别的会员，进行相应的打折，游戏中根据游戏的角色，打怪时也会产生不同的效果。
 *
 * 下面以游戏为例来描述策略模式(感兴趣的同学可以自行发挥加入防御，移动等技能)
 */

// 游戏角色接口
interface gameRole{
	// 攻击技能
	public function attack($blood);

}

// Master 法师
class Master implements gameRole{
	// 攻击力 50
	private $attack;
	public function __construct()
	{
		$this->attack = 50;
	}

	public function attack($blood)
	{
		echo '当前怪物还剩'.($blood - $this->attack).'血量';
	}
}

// fighter 格斗家
class fighter implements gameRole{
	// 攻击力 80
	private $attack;
	public function __construct()
	{
		$this->attack = 80;
	}

	public function attack($blood)
	{
		echo '当前怪物还剩'.($blood - $this->attack).'血量';
	}
}

// gunmen 枪手
class gunmen implements gameRole{
	// 攻击力 60
	private $attack;
	public function __construct()
	{
		$this->attack = 60;
	}

	public function attack($blood)
	{
		echo '当前怪物还剩'.($blood - $this->attack).'血量';
	}
}

// 战斗
class fight{
	private $role;
	public function __construct($role)
	{
		$this->role = $role;
	}

	public function setBoss($blood)
	{
		$this->role->attack($blood);
	}
}

// 创建一个格斗家
$fighter = new fighter();

// 发起战斗
$fight = new fight();

// 传入一个血量为500的大boss
$fight->setBoss(500);

dump($fighter->attack());
?>