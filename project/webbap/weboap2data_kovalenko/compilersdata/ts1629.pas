program tab5;
var a,b,c,d,x,y,h,f:real;
begin
  read(a);
  read(b);
  read(c);
  read(d);
  read(h);
  x:=a;
  y:=c;
  repeat
    f:=exp(1+x-y);
    write('f=',f:0:4,' ');
    x:=x+h;
    y:=y+h;
  until
    (x>b) and (y>d);
end.