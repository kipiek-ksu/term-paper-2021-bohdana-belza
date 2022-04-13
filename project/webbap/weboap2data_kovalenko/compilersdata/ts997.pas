program
var m,p,q,a,b,c:real;
begin
  read(m,p,q);
  a:=m*(1+q/p);
  b:=m*(1+p/q);
  c:=p+q;
  write(a:4:2,'',b:4;2,'',c:4:2);
end.