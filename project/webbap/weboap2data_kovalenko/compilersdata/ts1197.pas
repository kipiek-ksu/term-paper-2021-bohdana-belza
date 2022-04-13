program PRK111;
var a,x,y,z,z2:integer;
    r1,r2:integer;
begin
  read(a);
  x:=(a div 1000);
  y:=((a-x*1000) div 100);
  z:=(((a-x*1000)-y*100) div 10);
  z2:=(((a-x*1000)-y*100)-z*10);
  r1:=x+y;
  r2:=z+z2;
  write(r1,,r2);
end.