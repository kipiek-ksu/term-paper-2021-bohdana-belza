rogram N3;
type matrix=array[1..100,0..100] of integer;
var n,m,j,i: integer;
    s: matrix;
begin
readln(m,n);
for i:=1 to m do
 for j:=1 to n do
   s[i,j]:=(i+2*j);
for j:=1 to m do
 begin
 for i:=1 to n do
  write(s[j,i],' ');
 writeln;
 end;
end.