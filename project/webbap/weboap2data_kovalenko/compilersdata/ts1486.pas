Program z29;
var a,b,c,s:integer;
begin
read(a,b,c);
if (a<>0) and (b<>0) and (c<>0) then s:=a*b*c
else s:=a+b+c;
write(s);
end