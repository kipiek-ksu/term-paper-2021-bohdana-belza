program l3_1;
var a,b,c,d,r:real;
function r(a,b,c,d);
begin
    r:=a*d-b*c;
end;
Begin
     readln(a,b,c,d);
     writeln(r(a,b,c,d));
End.