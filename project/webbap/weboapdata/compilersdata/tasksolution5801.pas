program l2p17;
 var a,b,c,d:real;
begin
  read(d,c);
  if (c>0) and (d>c)  then
   begin
     a:= c-sqrt(sqr(c)-sqr(d));
     b:=2*c-a;
   end;
  write(a:20:1,' ',b:20:1);

end.