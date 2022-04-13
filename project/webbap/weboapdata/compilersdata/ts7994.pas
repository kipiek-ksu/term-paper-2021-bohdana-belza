program natural;
var a,n,m,k,i,q,f,s,r: longint;
l: real;
begin
Read (a,n);
i:=1;
k:=1;
r:=a;
s:=n;
while i<=s do begin
m:=a+k;
k:=k+1;
r:=r*m;
s:=s-1;
end;
q:=1;
for f:=1 to n do
q:=q*a;
l:=r/q;
writeln (l:1:3);
end.