Program lab4_z45;
uses crt;
procedure prisvoit(var b,c:integer);
var f:integer;
begin
f:=b;
b:=c;
c:=f;
end;
var x,y,a:integer;
begin
Read(x,y,a);
if (x=y) or (x=a) or (y=a) then write('no')
   else begin if x>y then
        begin prisvoit(y,x);
        if x>a then prisvoit(x,a);
        if y>a then prisvoit(y,a); end
   else begin if x>a then prisvoit(x,a);
   if y>a then prisvoit(y,a);
   end;
write(x,' ',y,' ',a);
end;
end.