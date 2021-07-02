<?php 
use People\Person ;
class Student extends Person implements HasJob {

    public $courses = [];

    public function __construct($name = null , $gender =null , $birthday =null , $title=null)
    {
        parent::__construct($name, $gender, $birthday);
        $this->title = $title;
    }
    public function addCourse($name)
    {
        $this->courses[]=$name;
        return $this;
    }

    public function getJob($job)
    {
        return $job;
    }  

    public function getName($name)
    {
        return $name;
    }

    public function setName($name)
    {
        $this->name = $name ;
        return $this;
    }
    public function setGender($gender)
    {
        return parent::setGender($gender);
    }
    
}

/*$student = new Student('Amr' ,Person::MALE , '8-3-2000' , 'Eng' );
$student->addCourse('MATH');
var_dump($student);*/

