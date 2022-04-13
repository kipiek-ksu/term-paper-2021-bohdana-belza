program r4_22;
var a,b,x:real;
    begin
    read (a,b);
    if b<0 then x:=b/a else
    if b>0 then x:=(-b)/a;
    write (x:0:2);end.