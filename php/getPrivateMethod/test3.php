<?php
/*
* Получить приватный метод из другого класса
*/
class User {

	/*
	* Собственно сам метод
	*/
	private function getName ($val)
	{
		return 'this is name ' . $val;
	}
}

/*
* Класс которому понадобился этот метод
*/
class Staff
{
	public function getUser ()
	{
		$user = new User();
		echo $this->callPrivateMethod($user, 'getName', ['Ivan']);
	}

	/*
	* Реализуем это все через рефлексию
	*/
	public function callPrivateMethod ($obj, string $method, array $args)
	{
		$class  = new ReflectionClass($obj);
		$method = $class->getMethod ($method);
		$method->setAccessible(true);
		return $method->invokeArgs($obj, $args);
	}
}


$staff = new Staff();
$staff->getUser();