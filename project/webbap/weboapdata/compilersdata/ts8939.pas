program ex_27;
var a,b,h:real;
    f:array[1..100] of real;
    i,n:integer;
begin
readln(a);
readln(b);
readln(h);
n:=1;
repeat
f[n]:=sin(2*a);
a:=a+h;
n:=n+1;
until a>=b;
for i:=1 to n-1 do
writeln(f[i]:0:4);
end.