program D_6_3;
var n,m,j,i: integer;

begin
readln(n,m);
for i:=1 to m do
 begin
 for j:=1 to n do
   write(i+2*j,' ');
 writeln;
 end;
end.