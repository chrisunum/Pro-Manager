<?php
include "../core/config.php";
include "../core/database.php";

$p = $_REQUEST["p"];
if($p=="search"){
	$q = $_REQUEST["q"];
$db = Database::getInstance();

//check search result
$sql2 = "select * from items where item_name like '%$q%' OR category like '%$q%' or sub_category like '%$q%' limit 10";
$check = $db->read($sql2);
$request = "";
if(is_array($check)){
	for($i=0; $i<count($check); $i++){
		$request .= $i==0? $check[$i]->item_name.":::".$check[$i]->item_id:"***".$check[$i]->item_name.":::".$check[$i]->item_id;
	}
}


echo $request==""? "no result" : $request;

}

if($p=="general"){
	$q = $_REQUEST["q"];
	$db = Database::getInstance();

	//check search result
	$sql2 = "select * from items where item_id = '$q' limit 1";
	$check = $db->read($sql2);
	$request = "";
	if(is_array($check)){
		$id = $q;
		$item = $check[0]->item_name;
		$category = $check[0]->category;
		$subcat = $check[0]->sub_category;
		$brand = $check[0]->brand;
		$details = $check[0]->details;
		$image = $fileList = count(glob('../images/items/'.$id.'/*'));
		$quantity = $check[0]->quantity;
		$price = $check[0]->price;
		$status = $check[0]->status;
		$seo = $check[0]->seo;

		$request = $id.':::'.$item.':::'.$category.':::'.$subcat.':::'.$brand.':::'.$details.':::'.$image.':::'.$quantity.':::'.$price.':::'.$price.':::'.$status.':::'.$seo;
	}


	echo $request==""? "no result" : $request;
}

if($p=="category"){
	$array = "";
		$db = Database::getInstance();
		$sql2 = "select distinct category from items";
		$check = $db->read($sql2);

		if(is_array($check)){
			for($i=0; $i<count($check); $i++){

				$array.=$i==0?$check[$i]->category:":::".$check[$i]->category;
			}
		}
		echo $array;
}

if($p=="subcategory"){
	$q = $_REQUEST["q"];
	$array = "";
		$db = Database::getInstance();
		$sql2 = "select distinct sub_category from items where category ='".$q."'";
		$check = $db->read($sql2);

		if(is_array($check)){
			for($i=0; $i<count($check); $i++){

				$array.=$i==0?$check[$i]->sub_category:":::".$check[$i]->sub_category;
			}
		}
		echo $array;
}

if($p=="brand"){
	$array = "";
		$db = Database::getInstance();
		$sql2 = "select distinct brand from items";
		$check = $db->read($sql2);

		if(is_array($check)){
			for($i=0; $i<count($check); $i++){

				$array.=$i==0?$check[$i]->brand:":::".$check[$i]->brand;
			}
		}
		echo $array;
}

?>