program l2p7;
 var x,y,z,a,b:real;
begin
  read(x,y,z);
  a:=((1+sqr(sin(x+y)))/(2+abs(x-(2*x)/(1+sqr(x)*sqr(y))))+x);
  If z<>0 then
    b:=sqr(cos(arctan(1/z)));
  write(a:20:3,' ',b:20:3);
end.
