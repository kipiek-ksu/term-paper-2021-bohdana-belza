program p1;
var n,i: integer; k: real;
begin
read(n);
k:= sqrt(2);
for i:= 2 to n do
k:=sqrt(2+k);
write (k:3:3);
end.