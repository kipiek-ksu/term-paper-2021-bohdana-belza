program Basen;
  var a,b,c,x,y,z:real;
begin
read(a,b,c);
   z:=(-a*b*c+(sqr(a*b*c)+4*(a*b-a*c-b*c)*(a*b*c)))/(2*(a*b-a*c-b*c));
   y:=-((b*z)/(b-z));
   x:=-((a*y)/(a-y));
write(x:5:3,y:5:3,z:5:3);
end.