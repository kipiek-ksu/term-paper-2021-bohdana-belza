var a,r:real;
begin
 read(a);
  r:=(0.5*sqr(a)*sin(2*pi/3))/(a+0.5*(a*sqrt(2-2*cos(2*pi/3))));
 writeln (r:6:3);
end.