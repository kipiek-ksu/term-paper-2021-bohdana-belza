var x,a,r:real; n,i:integer;

begin
clrscr;
  read(x,a,n);
  r:=x;
  for i:=1 to n do
  r:=sqr(r+a);
  r:=r+a;
  write(r:8:4);
end.

