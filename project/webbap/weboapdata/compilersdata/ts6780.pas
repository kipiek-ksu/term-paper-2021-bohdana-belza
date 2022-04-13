program r13;
type matrix=array[1..100,1..100] of integer;
var mat: matrix;
    i,j,v,l,y,u: integer;
    
begin
readln(v,l);
for i:=1 to v do
 for u:=1 to l do
  begin
   y:=y+1;
   mat[i,u]:=y;
  end;

for i:=1 to v do
 begin
  for u:=1 to l do
   write((mat[i,u])/(v*l):0:1,' ');
  writeln;
 end;
end.