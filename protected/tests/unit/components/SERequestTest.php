<?php

class SERequestTest extends CTestCase
{
    /**
     * @var SERequest
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SERequest;
        
        $_GET['mxd']='+1.';
        $_GET['rr']=array('1','2');
        $_POST['mxd']='+1.';
        $_POST['rr']=array('1','2');
    }  
    
    public function testGetArray()
    {
        $this->assertEquals(array(), $this->object->getArray('nll'));
        $this->assertEquals(array('1','2'), $this->object->getArray('rr'));        
        $this->assertEquals(array('1','2'), $this->object->getArray('rr',array(),'POST'));		
		$this->assertEquals(array('+1.'), $this->object->getArray('mxd'));
		$this->assertNotEquals(array('+11'), $this->object->getArray('mxd'));
    }
    
    public function testGetInt()
    {
        $this->assertTrue(is_int($this->object->getInt('nll')));
        $this->assertTrue(is_int($this->object->getInt('mxd')));
        $this->assertTrue(is_int($this->object->getInt('mxd',0,'POST')));
    }
    
    public function testGetFloat()
    {
        $this->assertTrue(is_float($this->object->getFloat('nll')));
        $this->assertTrue(is_float($this->object->getFloat('mxd')));
        $this->assertTrue(is_float($this->object->getFloat('mxd',0,'POST')));
    }
    
    public function testGetString()
    {
        $this->assertTrue(is_string($this->object->getString('nll')));
        $this->assertTrue(is_string($this->object->getString('mxd')));
        $this->assertTrue(is_string($this->object->getString('mxd',0,'POST')));
    }
    
    public function testGetValue()
    {
        $this->assertTrue(is_string($this->object->getValue('mxd')));        
        $this->assertTrue(is_string($this->object->getValue('mxd',0,'POST')));
        
        $this->assertTrue(is_int($this->object->getValue('mxd',0,'GET','int')));
        $this->assertTrue(is_int($this->object->getValue('mxd',0,'POST','int')));
        
        $this->assertTrue(is_float($this->object->getValue('mxd',0,'GET','float')));
        $this->assertTrue(is_float($this->object->getValue('mxd',0,'POST','float')));        
        
        $this->assertTrue(is_array($this->object->getValue('rr',0,'GET','array')));
        $this->assertTrue(is_array($this->object->getValue('rr',0,'POST','array')));
    }
    
    public function testIsValue()
    {
        $this->assertFalse($this->object->isName('nll'));
        $this->assertTrue($this->object->isName ('mxd'));
        $this->assertTrue($this->object->isName ('mxd', 'POST'));
    }
}