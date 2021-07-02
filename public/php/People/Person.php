<?php 
namespace People ;

class Person 
{

    //Properteis
    public $name ;
    protected $birthday;
    protected $gender;
    private $id;
    protected $attrs = [];
    //Static properties 
    public static $job = 'mentor' ; 


    public function __construct($name =null ,$gender=null , $birthday=null){
        $this->id =uniqid();
        $this->name=$name;
        $this->setGender($gender);
        $this->setBirthday($birthday);
       
    }
    //Constants
    const MALE='m';
    const FEMALE='f'; 

    

    //Methods
    public function setBirthday($birthday)
    {
        $this->birthday= $birthday;
        return $this;
    }
    public function setGender($gender)
    {
        $this->gender= $gender;
        return $this;
    }
    public static function setJob($job){
        self::$job= $job;
        return new self();
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getGender()
    {
        return $this->gender;
    }
    //Magic Methods 
    public function __toString(){
        return $this->name ."\n";
    }

    public function __set($name , $value)
    {
        $this->attrs[$name] = $value;
    }

    public function __get($name)
    {
        return $this->attrs[$name] ?? null;
    }

    public function __call($name , $arguments)
    {
        echo $name . "\n" ;
    }

    public static function __callStatic($name , $arguments)
    {
        echo $name."(Static)";
    }
}


/*$person= new Person('Amr' , Person::MALE , '8-3-2001');
$person->age=20;
echo $person->age;
$person::getAge();*/

/*$developer = Person::setJob('Developer');

$amr = new Person('amr' , Person::MALE ,'8-3-2001');
echo $amr ;
$amjad = new Person('amjad' , Person::FEMALE , '8-2-1995' );
//var_dump($amr , $amjad);
exit;
$person->setGender(Person::MALE)->setBirthday('8-3-2000');
//$person2= $person ; //assign by referance
//$person2->setBirthday('8-8-2000')->setGender(Person::FEMALE);

 $person2= clone $person; 
 $person2->setGender(Person::FEMALE)->setBirthday('8-2-1995');
//Wrong Type   $person->gender 
//True Type    $person->getGender()

echo $person->getGender() . "\n" ;
echo $person->getBirthday();*/