program ercoder;
 var a,b:real;
begin
 read(a,b);
 if a>0 then
  write('x>',-b/a:6:2) else
 if a<0 then write('x<',-b/a:6:2);
end