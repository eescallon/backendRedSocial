<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Test;


class TestController{
	
	public function test()
	{
		$test = new Test();
		$test.setName("Eduardo");
		return new Response("<html><body>Hola Mundo</body></html>");
	}


}
?>