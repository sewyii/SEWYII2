<?php

/**
 * The component handles the input data. Supports GET and POST methods.
 * @author Treitsiak A. <at@webmen.ca>  
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SERequest extends CHttpRequest
{
	/**
     * HTTP methods.
     */
    const GET       = 'GET';
	const POST      = 'POST';
    
    /**
     * Return value as Integer. 
     * @param string $name
     * @param int $default
     * @param string $method
     * @return int 
     */
    public function getInt($name, $default=0, $method=self::GET)
    {
        return $this->_value($name, $default, $method, $type='int');       
    }
    
    /**
     * Return value as String. 
     * @param string $name
     * @param string $default
     * @param string $method
     * @return string 
     */
    public function getString($name, $default='', $method=self::GET)
    {
        return $this->_value($name, $default, $method, $type='string');
    }
    
    /**
     * Return value as Float. 
     * @param string $name
     * @param float $default
     * @param string $method
     * @return float 
     */
    public function getFloat($name, $default=0.0, $method=self::GET)
    {
        return $this->_value($name, $default, $method, $type='float');
    }
    
    /**
     * Return value as Array.
     * @param string $name
     * @param mixed $default
     * @param string $method
     * @return array
     */
    public function getArray($name, $default=array(), $method=self::GET)
    {        
        return $this->_value($name, $default, $method, $type='array');
    }
    
    /**
     * Return values as String|Integer|Float|Array.
     * @param string $name
     * @param mixed $default
     * @param string $method
     * @param string $type
     * @return mixed 
     */
    public function getValue($name, $default='', $method=self::GET, $type='string')
    {
        return $this->_value($name, $default, $method, $type);
    } 
    
    /**
     * Check whether there is a variable.
     * @param string $name
     * @param string $method
     * @return boolean
     */
    public function isName($name, $method=self::GET)
    {
        $mass = ($method == self::GET) ? $_GET : $_POST;
        return (isset($mass[$name])) ? true : false;
    }
    
    /**
     * Find and validate value. 
     * @param string $name
     * @param mixed $default
     * @param string $method
     * @param string $type
     * @return mixed 
     */
    protected function _value($name, $default, $method, $type)
    {
        $mass = (strtoupper($method) == self::GET) ? $_GET : $_POST;
        return (isset($mass[$name])) ? $this->_validate($mass[$name], $type) : $default;
    }
    
    /**
     * Validate value.
     * @param mixed $value
     * @param string $type
     * @return mixed 
     */
    protected function _validate($value, $type='string')
    {
        if($type == 'string')
        {
            return (string) filter_var(
                $value,
                FILTER_SANITIZE_STRIPPED
            );
        }    
        elseif($type == 'int')
        {
            return (int) filter_var(
                $value,
                FILTER_SANITIZE_NUMBER_INT
            );
        }   
        elseif($type == 'float')
        {
            return (float) filter_var(
                 $value,
                 FILTER_SANITIZE_NUMBER_FLOAT,
                 FILTER_FLAG_ALLOW_FRACTION
            );
        }   
        elseif($type == 'array')
        {
            if(is_array($value))
                return $value;
            else 
                return array((string)$value);
        }           
    }    
    
    /**
     * Return value as Array. 
     * @param mixed $value
     * @return mixed 
     */
    protected function _convertArray($value)
    {
         if(is_array($value))
         {
             return $value;
         }    
    }
}
