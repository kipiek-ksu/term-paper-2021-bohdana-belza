program z46;
var a,b,c,t1,t2,t3:real;
begin
  read(a,b,c);
  t3:=2*a*b*c/(a*b-b*c+a*c);
  t2:=c*t3/(t3-c);
  t1:=a*t2/(t2-a);
  write(t1:5:3,' ',t2:5:3,' ',t3:5:3);
end.
