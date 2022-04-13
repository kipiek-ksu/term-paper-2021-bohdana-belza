program L_3_8;
var x1,y1,x2,y2,d:real;
function otrezok(x1,y1,x2,y2:real):real;
        var d:real;
        begin
        d:=sqrt(sqr(x1-x2)+sqr(y1-y2));
        otrezok:=d;
        end;
begin
  readln(x1,y1,x2,y2);
  d:=otrezok(x1,y2,x2,y2);
  writeln(d:0:2);
end.