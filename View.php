<?php
namespace GLSIDFramwork ;
class View {
    private $name ;
    private $values = array() ;

    public function __construct($name, $values = null)
    {
        $this->name = $name;
        $this->values = $values;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $value
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    public function __toString()
    {
        return $this->name.' '.$this->value;
    }

    public static function SearchVue ($vue){
        $file = glob('vue/'.$vue->getName().'.php');
        if (sizeof($file) == 0){
            return false ;
        }
        else {
            return 'vue/'.$vue->getName().'.php' ;
        }
    }


}