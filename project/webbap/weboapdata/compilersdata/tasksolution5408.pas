program z13;
const Pi=3.14;
var s,r,h:real;
begin
  read(r,h);
  s:=2*Pi*sqr(r)*h;
  write(s:3:2);
end.