program p19;
var a,r:real; n,i: integer;
begin
read(a,n);
r:=a;
for i:= 1 to n-1 do
r:=r*a;
write (r:3:2);
end.
