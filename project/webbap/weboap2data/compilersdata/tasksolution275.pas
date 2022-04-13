program z1;
var  j,x:integer;s:real;

function fact (n:integer):longint;
begin
if n=0 then fact:=1 else fact:=n*fact(n-1);
end;

begin
readln(x);
s:=0;
for j:=1 to 7 do
if j mod 2 =0 then s:=s-(exp((2*j-1)*ln(x))/fact(2*j-1))
else s:=s+(exp((2*j-1)*ln(x))/fact(2*j-1));
writeln(s);
end.