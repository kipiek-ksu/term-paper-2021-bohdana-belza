program tab;
var a,b,h,x,f:real;
begin
  read(a);
  read(b);
  read(h);
  x:=a;
  repeat
    f:=(sin(x)+cos(x));
    write('f=',f:0:4,' ');
    x:=x+h;
  until a>b;
end.