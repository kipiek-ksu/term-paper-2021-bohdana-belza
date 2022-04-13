program z_18;
var a,n:integer;
begin
read(a,n);k:=a;l:=a;
for i:=1 to n do l:=l*(a+i);
for i:=1 to n do k:=k*a; 
l:=l/k;
write(l:0:3);
end.