program da1;
var a,n,k,b,ch,z,i,s:integer;
begin
write('n='); readln(n);
ch:=n;
b:=ch mod 10;
k:=0;
repeat
 ch:=ch div 10;
 k:=k+1;
until ch<10;
writeln(k);
s:=1;
for i:=1 to k do s:=s*10;
z:=(n mod s) div 10;
z:=b*s+z*10+ch;
writeln(z);
readln;
end.