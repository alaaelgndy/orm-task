<?php 
namespace Task\Traits;

trait HandleArrays
{

	/**
	* @param array $data
	* validate input array with fields in model
	* remove element if array[input] not fount 
	* set this key in object with it's value in array if array[input] found
	* @return data after filteration
	*/
	public function validateArrayAndSetValues(array $data)
    {
        $keys = $this->getArrayKeys($data);
        foreach ($keys as $value) {
            if (!in_array($value, $this->fields)) 
            {
                unset($data[$value]);
            }
            else
            {
            	$this->$value = $data[$value];
            }
        }
        return $data;
    }

    /**
    * @param array $array
    * @return array keys
    */
	public function getArrayKeys(array $array)
	{
		return array_keys($array);
	}   

 	/**
    * @param array $array
    * @return array values
    */
	public function getArrayValues(array $array)
	{
		return array_values($array);
	}

	/**
    * @param array $array , string $pattern 
    * @return keys as string
    */
	public function arrayKeysToString(array $array , $pattern = ",")
	{
		return implode($pattern, $this->getArrayKeys($array));
	}

	/**
	* @param array $data
	* we use it in insert statement
	* @return string "?"
	*/
	public function valuesCount(array $data)
	{
		$values = '';
		for ($i = 0; $i < count($data); $i++) {
			$values .= '?,'; 			
		}
		return substr($values, 0, strlen($values)-1);
	}

	/**
	* @param array $array 
	* @return string keys , string "?" , array values
	*/
	public function HanldeInsertionArray(array $array)
	{
		return [
			'keys' => $this->arrayKeysToString($array),
			'valuesCount' => $this->valuesCount($array),
			'values' => $this->getArrayValues($array)
		];
	}


	/**
	* @param array $array 
	* @return string keys with ? like (name  = ? , password = ?)
	*/
	public function HanldeUpdateArray(array $array)
	{
		return [
			'keys' => $this->arrayKeysToString($array , "=?,")."=?",
			'values' => $this->getArrayValues($array) 
		];
	}
}