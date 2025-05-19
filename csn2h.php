<?php
function ppr($arr, $header = false, $return = false)
{
    $out = '';
    $btr = debug_backtrace();
    if($header!==false) $out.="<strong>$header</strong><br>";
    $out.='<pre>';
    $out.='FROM:';
    $out.=$btr[0]['file'].'@'.$btr[0]['line'].' '.$btr[0]['function']."\n";
    if(count($btr)>1) $out.=$btr[1]['file'].'@'.$btr[1]['line'].' '.$btr[1]['function']."\n";
    $out.='Type: '.gettype($arr)."\n";
    if(gettype($arr)=='boolean')
    {
        $out.=var_dump($arr);
    }
    else
    {
        $out.=print_r($arr, true);
    }
    $out.='</pre>';
    if($return===false)
    {
        echo $out;
    }
    return $out;
}


if(isset($_GET['uids'])) {
	$uids = $_GET['uids'];
	$uids = explode("\n", $uids);
	$cid = isset($_GET['cid'])?$_GET['cid']:1;
	$hashed = array();
	for($i=0;$i<count($uids);$i++)
	{
		// ppr($uids[$i]*$cid);
		$hashed[] = sha1($uids[$i]*$cid);
	}
	?>
	<pre><?php
	print_r(json_encode($hashed));
	?></pre>
	<form><input type="submit" value="Reset" /></form>
	<?php 
}
else
{
?>
<!doctype html>
<html>
<head>
<title></title>
<style>
	input[type='text'], textarea {
		width: 30em;
		display: block;
	}
	textarea {
		height: 20em;
	}
</style>
</head>
<body>
<form>
	<input type="text" id="cid" name="cid" />
	<textarea id="uids" name="uids"></textarea>
	<input type="submit" value="Translate" />
</form>
</body>
</html>
<?php
}
?>