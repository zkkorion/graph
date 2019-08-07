<?

$re = '/<tr[^>]*+>\s*+(?#
)<td[^>]*+>(?<ticket>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>(?<opentime>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>\s*+(?<type>buy|balance)\s*+<\/td>\s*+(?#
)(?:<td[^>]*+>(?<profit>[^<]*+)<\/td>\s*+)*+(?#
)<\/tr>/m';
$str = file_get_contents('assets/statement1.html');
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

$newArr = array();
foreach ($matches as $key => $value)
{
	$tmpArr['ticket'] = $value['ticket'];
	$tmpArr['type'] = $value['type'];
	$tmpArr['profit'] = $value['profit'];
	$newArr[] = $tmpArr;
}
$json = json_encode($newArr);
// Print the entire match result
print '<style>pre{background-color:#000000;color:#1ace38;font-size:14px;width:100%;max-width:1200px;margin:0 auto;padding:30px;height:900px;overflow:scroll;}</style>';
print '<pre>';
print_r($json);
print '</pre>';
?>