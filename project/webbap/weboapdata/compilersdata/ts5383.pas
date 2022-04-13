program z13;
var i,n,x:integer;
begin
  read(n);
  i:=(n mod)div 10;
  i:=n div 100;
  x:=n mod 100;
  i:=i+x;
  write(i);
end.