program ercoder;
 var n,i:byte;x,k:real;
function f(x:real;n:byte):real;
 var i:byte;t:real;
begin
 t:=x;
 for i:=2 to n do
  t:=t*x;
 f:=t;
end;
begin
 k:=0;
 read(n,x);
 for i:=1 to n do
  k:=k+f(sin(x),i);
 write(k:9:4);
end.