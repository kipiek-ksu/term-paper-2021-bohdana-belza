program z1;
var a,k:real;
n,i:integer;
begin
readln(a,n);
k:=1;
for i:=0 to n do
k:=k*(a-i*n);
write(k:1:3);
end.