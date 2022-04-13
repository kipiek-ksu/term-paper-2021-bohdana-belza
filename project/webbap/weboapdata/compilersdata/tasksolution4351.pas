program l_7_40;
const pi = 3.14;
var a,b,h,i,f,x : real;
begin
  readln (a);
  readln (b);
  readln (h);
  i:= a;
  while ((i>=a)and(i<=b))or((i<=a)and(i<=b)) do
    begin
      x := i*i;
      f := sin ((1/x)*pi/180) / cos ((1/x)*pi/180);
      i := i + h;
      writeln (f:0:4);
    end;
end.