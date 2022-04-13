program z1;
var n,m,z:integer;
function C(m, n : integer) : integer; 

begin 

if (m<=1) or (n=0) or (n=m) then C:=1 

else C:= C(m-1, n-1)+C(m-1, n) 

end;
begin
readln(n,m);
z:=c(n,m);
write(z);
end