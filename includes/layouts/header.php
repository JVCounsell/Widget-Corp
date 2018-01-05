<?php if(!isset($layout_context)){
	$layout_context = "public";
} ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Widget Corp <?php if($layout_context == "admin"){
		  echo "Admin";
	  }?></title>
	<link href="css/public.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="header">
      <h1>Widget Corp <?php if($layout_context == "admin"){
		  echo "Admin";
	  }?></h1>
    </div>