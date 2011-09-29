<?php

require_once dirname(__FILE__) . '/../../../behaviors/SEEventEntityBehavior.php';

class SEEventEntityBehaviorTest extends CTestCase
{

    /**
     * @var SEEventEntityBehavior
     */
    protected $object;

    protected function setUp()
    {
	$this->object = new SEEventEntityBehavior;
    }

    public function testGetObjectType()
    {
	$private = self::getMethod('getObjectType');
	$this->assertInstanceOf('CWebUser', $private->invokeArgs($this->object, array('user', 'components')));
	$this->assertNull($private->invokeArgs($this->object, array('test', 'components')));
    }

    protected static function getMethod($name)
    {
	$class = new ReflectionClass('SEEventEntityBehavior');
	$method = $class->getMethod($name);
	$method->setAccessible(true);
	return $method;
    }
}