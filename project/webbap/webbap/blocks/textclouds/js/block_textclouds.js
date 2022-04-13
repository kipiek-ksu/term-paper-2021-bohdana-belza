
function popup(tag){
    var winl = (screen.width-800)/2;
  var wint = (screen.height-500)/2;
  if (winl < 0) winl = 0;
  if (wint < 0) wint = 0;
     var style = "top="+wint+", left="+winl+", width=800, height=500, status=no, menubar=no, toolbar=no";
     window.open(tag, "", style);
}