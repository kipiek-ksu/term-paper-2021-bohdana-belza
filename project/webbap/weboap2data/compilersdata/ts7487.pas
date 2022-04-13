program f;
var x,y,z,a,b:real;
begin
  read(x,y,z);
  a:=(sqrt(abs(x-1))-sqrt(abs(y)))/(1+(sqr(x))/2+(sqr(y))/4);
  b:=x*(arctan(z)+exp(-(x+3)));
  write(a:2:2,' ',b:2:2);
end.