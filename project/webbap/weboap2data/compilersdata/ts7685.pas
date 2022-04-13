program z11;
 type fix=array [1..100] of integer;
 var n,m,i:byte;
     a,b,c:fix;
     l:integer;
function min(a:fix;n:byte):integer;
 var i:byte;x:integer;
begin
 x:=a[1];
 for i:=2 to n do
  if a[i]<x then x:=a[i];
 min:=x;
end;
function max(a:fix;n:byte):integer;
 var i:byte;x:integer;
begin
 x:=a[1];
 for i:=2 to n do
  if a[i]>x then x:=a[i];
 max:=x;
end;
begin
 read(n,m);
 for i:=1 to n do
  read(a[i]);
 for i:=1 to m do
  read(b[i]);
 for i:=1 to 15 do
  read(c[i]);
 if abs(min(a,n))>10 then l:=min(b,m)+min(c,15) else
  l:=1+sqr(max(c,15));
 write(l);

end.