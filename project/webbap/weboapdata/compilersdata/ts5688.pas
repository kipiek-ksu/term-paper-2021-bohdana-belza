program z10;
var a,b,c,D,x1,x2:real;
begin
  read(a,b,c);
  D:=b*b-4*a*c;
  if D<0
  then writeln(NO ANSWER)
  else
  x1:=((-b)+sqrt(d))/(2*a);
  x2:=((-b)-sqrt(d))/(2*a);
  write(x1:3:3,x2:3:3);
end.
