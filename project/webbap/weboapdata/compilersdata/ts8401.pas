program lab4z17;
var a,b,c,d,w,x,y,z:integer;
begin
read(a,b,c,d);
 if (a<=b) and (b<=c) and (c<=d) then
 begin
  w:=d;
  x:=d;
  y:=d;
  z:=d;
 end;
 else
  if (a>b) and (b>c) and (c>d) then
   begin
    w:=a;
    x:=b;
    y:=c;
    z:=d;
   end;
 else
   begin
    w:=sqr(a);
    x:=sqr(b);
    y:=sqr(C);
    Z:=SQR(D);
   end;
write(w,' ',x,' ',y,' ',z);
end.