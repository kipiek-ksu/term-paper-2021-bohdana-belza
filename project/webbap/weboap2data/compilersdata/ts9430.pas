program _6_13;
var
   n,m:word;
   i,j:integer;  max:real;
   a:array[1..100,1..100] of real;
begin

 read(n,m);
 for i:=1 to n do
 for j:=1 to m do
  begin
   read(a[i,j]);
  end;

  max:=abs(a[1,1]);
  for i:=1 to n do
  for j:=1 to m do
   begin
    if abs(a[i,j])>max then max:=abs(a[i,j]);
   end;

  for i:=1 to n do
  begin
   for j:=1 to m do
    begin
     write((a[i,j]/max):0:1,' ');
    end;
    writeln;
  end;

end.