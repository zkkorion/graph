<?
$str = file_get_contents($_FILES['graphData']['tmp_name']);
$re = '/<tr[^>]*+>\s*+(?#
)<td[^>]*+>(?<ticket>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>(?<opentime>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>\s*+(?<type>buy|balance)\s*+<\/td>\s*+(?#
)(?:<td[^>]*+>(?<profit>[^<]*+)<\/td>\s*+)*+(?#
)<\/tr>/m';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
if(empty($matches))
	return 'wrong file';
$newArr = array();
$balance = 0;
foreach ($matches as $i => $value)
{
	$balance += (float)$value['profit'];
	$tmpArr['type'] = 'ticket';
	$tmpArr['ticket\'s number'] = $i;
	$tmpArr['ticket\'s type'] = ($value['type'] == 'buy') ? 'buy' : 'transfer';
	$tmpArr['profit'] = $value['profit'];
	$tmpArr['balance'] = $balance;
	$newArr[] = $tmpArr;
}
header('Content-type: application/json');
print json_encode($newArr);