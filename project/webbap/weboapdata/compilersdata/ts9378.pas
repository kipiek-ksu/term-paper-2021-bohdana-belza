program ercoder;
 var a,b,c,d,x1,x2:real;
begin
 read(a,b,c);
 d:=b*b-4*a*c;
 if d>0 then
  begin
   x1:=-1*b+sqrt(d);
   x2:=-1*b-sqrt(d);
   write(x1,'   ',x2);
  end;
 else write('NO ANSWER');
end.