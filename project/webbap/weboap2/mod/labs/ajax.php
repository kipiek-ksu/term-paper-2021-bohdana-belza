//AjAX caught
require_once ('jlib/JsHttpRequest/JsHttpRequest.php');
$JsHttpRequest =& new JsHttpRequest("windows-1251");
// Fetch request parameters.
$str = $_REQUEST['str'];
$upl = @$_FILES['int'];
$GLOBALS['_RESULT'] = array(
      "str"   => 'file name' . $str,
      "md5"   => 'md5' . $upl,
    );