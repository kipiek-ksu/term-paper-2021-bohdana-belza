program z36;
type mas =array[1..50] of real;
var i,n,m:inteer;
    a,b:mas;
procedure zamena(i,n:integer;a:mas);
var min:real;
    j:integer;
begin
  min:=a[1];
  for i:=2 to n do
  if a[i]<min then min:= a[i];
  for i:=1 to n do
  if a[i]= min then
   for j:=i+1 to n do
   a[i]:=21.05;
  for i:=1 to n do
  write(a[i]:5:2,' ');
  end;
begin
  read(n,m);
  for i:=1 to n do
  read(a[i]);
  for i:=1 to m do
  read(b[i];
  zamena(i,n,a);
  zamena(,m,b);
end.