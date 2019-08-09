<?
// function ShowRes($var, $mode = true, $show = true)
// {
//     echo '<style>pre{background-color:#000000;color:#1ace38;font-size:14px;width:100%;max-width:1200px;margin:0 auto;padding:30px;height:900px;overflow:scroll;}</style>';
//     echo (($show) ? '<pre>' : '<pre style="display:none;">');
//     if ($mode)
//     {
//         print_r($var);
//     }else
//     {
//         var_dump($var);
//     }
//     echo '</pre>';
// }
$str = file_get_contents($_FILES['graphData']['tmp_name']);
$re = '/<tr[^>]*+>\s*+(?#
)<td[^>]*+>(?<ticket>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>(?<opentime>[^<]*+)<\/td>\s*+(?#
)<td[^>]*+>\s*+(?<type>buy|balance)\s*+<\/td>\s*+(?#
)(?:<td[^>]*+>(?<profit>[^<]*+)<\/td>\s*+)*+(?#
)<\/tr>/m';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
// ShowRes($matches);
if(empty($matches))
	return 'wrong file';
$newArr = array();
$balance = 0;
foreach ($matches as $i => $value)
{
	$balance += (float)str_replace(' ', '', $value['profit']);
	$tmpArr['type'] = 'ticket';
	$tmpArr['ticket\'s number'] = $i;
	$tmpArr['ticket\'s type'] = ($value['type'] == 'buy') ? 'buy' : 'transfer';
	$tmpArr['profit'] = $value['profit'];
	$tmpArr['balance'] = $balance;
	$newArr[] = $tmpArr;
}
header('Content-type: application/json');
print json_encode($newArr);