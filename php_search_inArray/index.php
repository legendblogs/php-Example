<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$array = array(
		'sales' => array(
			'id' 		=> 'sales',
			'department'=> 'Sales',
			'employe'	=> array(
				'0' => array(
					'name' 		=> 'Thor',
					'age'		=> '34'
				),
				'1' => array(
					'name' 		=> 'Barton',
					'age'		=> '30'
				),
				'2' => array(
					'name' 		=> 'Hulk',
					'age'		=> '37'
				),
				'3' => array(
					'name' 		=> 'Tony',
					'age'		=> '35'
				)
			)
		),
		'accounts' => array(
			'id' 		=> 'accounts',
			'department'=> 'Accounts',
			'employe'	=> array(
				'0' => array(
					'name' 		=> 'Iron Man',
					'age'		=> '34'
				),
				'1' => array(
					'name' 		=> 'Black',
					'age'		=> '30'
				),
				'2' => array(
					'name' 		=> 'Captain',
					'age'		=> '37'
				),
				'3' => array(
					'name' 		=> 'Loki',
					'age'		=> '35'
				)
			)
		)
	);

function array_get_location($array, $search, $keys = array())
{
    foreach($array as $key => $value) {
        if (is_array($value)) {
            $child_array = array_get_location($value, $search, array_merge($keys, array($key)));
            if (count($child_array)) {
                return $child_array;
            }
        } elseif ($value === $search) {
            return array_merge($keys, array($key));
        }
    }
    return array();
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find Location Of An Item In Multidimensional Array</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h2 class="text-success">Find Location Of An Item In Multidimensional Array</h2>
    <?php
    echo "<pre>";
    echo "Search for Name:  Loki <br>";
	print_r(array_get_location($array, 'Loki'));
    echo "</pre>";
    
    echo "<pre>";
    echo "Search for Name:  Hulk <br>";
	print_r(array_get_location($array, 'Hulk'));
    echo "</pre>";
    ?>
</div>
   
</body>
</html>
