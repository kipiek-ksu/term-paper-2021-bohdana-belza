program z_17;
var
  x1,y1,x2,y2,z1,z2:real;
  procedure length_v(x1,x2,y1,y2:real;
  var z1,z2:real);
begin
  z1:=(x1+x2)/2;
  z2:=(y1+y2)/2;
end;
begin
  read(x1,y1,x2,y2);
  length_v(x1,y1,x2,y2,z1,z2);
  write(z1:0:2,,z2:0:2);
end.