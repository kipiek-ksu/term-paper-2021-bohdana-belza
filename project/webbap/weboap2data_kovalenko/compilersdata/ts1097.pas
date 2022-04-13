program PRK237;
var m,p,q:integer;
    a,b,c:real;
begin
  read(m,p,q);
  a:=m*(1+p/q);
  b:=m*(1+q/p);
  c:=p+q;
  write(a:0:2,,b:0:2,,c:0:2);
end.