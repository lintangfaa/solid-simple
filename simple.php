<!doctype html>
<html lang="en">
  <head>
  		<title>Check Your Age</title>
  </head>

  <body>
    <div class="container col-md-3">
        <center><h3 class="mt-4">How old are you?</h3></center>
  </body>
</html>

<?php

$data = [
    'name' => 'Lintang Fauziyatu Azmi', 
    'email' => 'lintang1900018258@webmail.uad.ac.id',
    'dob' => '04.10.1999'
];

class Simple {
    public $name;
    public $email;
    public $dob;

    public function __construct($data) {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->dob = $data['dob'];
    }
}

class Age {
    public static function getAge($data){
        $birth = new DateTime($data['dob']);
        $today = new Datetime(date('d.m.y'));
        $age = $today->diff($birth);
        return 'Your Age is : '.$age->y.' years, '.$age->m.' months '.$age->d.' days ';
    }
}

class UserRequest {
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
        'dob' => 'string'
    ];

    public static function validate($data){
        foreach (static::$rules as $property => $type){
            if (gettype($data[$property]) != $type){
                throw new \Exception("User property {$property} must be of type {$type}" );
            }
        }
    }
}

class Json {
    public static function form($data){
        return json_encode($data);
    }
}

UserRequest::validate($data);
$user = new Simple($data);
print_r(Json::form($user));
echo '<br><br>';
print_r(Age::getAge($data));