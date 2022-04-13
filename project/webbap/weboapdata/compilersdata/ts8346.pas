 program hdf;
  var a,b,k,r: real;
  begin
  read (b);
  read(a);
  read(k);
  r:= (sqrt(sqr(k*b)+(4*a*b*k*100))-(b*k))/(2*b);
  write (r:4:3);
  end.