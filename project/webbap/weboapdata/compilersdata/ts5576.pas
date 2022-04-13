Program 13;
var a,z:real;
begin
  read(a);
  a:=(a/180*3.14);
  z:=(1-cos(2*a))*cos(3.14/4+2*a)/(2*sqr(sin(2*a))-sin(4*a));
  write(z:0:4);
end.