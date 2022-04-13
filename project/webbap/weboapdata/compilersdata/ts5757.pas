program 8ghf;
var x,y,z:real;
begin
  readln(x,y,z);
  if (x<0) or (y<0) or(z<0)then
begin
  x:=abs(x);
  y:=abs(y);
  z:=abs(z);
end
  else
begin
  x:=2*x;
  y:=2*y;
  z:=2*z;
  writel(x:0:4,' ',y:0:4,' ',z:0:4);
end. 
